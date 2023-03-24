<div class="navbar-header gap-3">
    <div class="push">
        <a href="javascript:void(0)" onclick="openNav()"><img src="<?= base_url(); ?>/public/images/icons/menu.svg"></a>
    </div>
    <div class="logo">
        <a href="<?php echo base_url(); ?>"><img src="<?= base_url(); ?>/public/images/logo.svg"></a>
    </div>

    <div class="select-location">
        <div class="input-group">
            <label class="input-group-text" for="nav-zipcode">
                <i class="bi bi-geo-alt"></i>
            </label>
            <div class="search-area">
                <input type="search" placeholder="Zip or City" data-id="<?= (isset($filters['zip'])) ? $filters['zip'] : 0 ?>" value="<?= (isset($zipName)) ? $zipName : '' ?>" title="<?= (isset($zipName)) ? $zipName : 'location' ?>" class="form-control cstm-border-left-radius0-location" id="nav-zipcode">
            </div>
        </div>
    </div>

    <div class="select-distance">
        <div class="input-group">
            <label class="input-group-text" for="nav-distance">
                <img src="<?= base_url(); ?>/public/images/icons/target.svg" width="18px">
            </label>
            <select class="form-select" id="nav-distance" onchange="filterPosts()" <?= (!isset($distanceFlag) || $distanceFlag == false) ? 'disabled' : '' ?>>
                <option value="0">Distance</option>
                <?php
                if (isset($navbar) && isset($distanceFlag) && $distanceFlag == true) {
                    foreach ($navbar['distances'] as $key => $distance) {
                        $selected = ($key == $filters['distance']) ? 'selected' : '';
                ?>
                        <option value="<?= $key ?>" <?= $selected ?>><?= $distance ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="search-filter">
        <div class="search-area">
            <select class="form-select cstm-border-right-radius0" id="nav-category" onchange="filterPosts()">
                <option value="0" selected>Search Categories</option>
                <?php
                if (isset($navbar)) {
                    foreach ($navbar['categories'] as $category) {
                        $selected = ($category['id'] == $filters['category']) ? 'selected' : '';
                ?>
                        <option value="<?= $category['id'] ?>" <?= $selected ?>><?= $category['name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>

        <div class="search-area">
            <input type="search" placeholder="What are you looking for?" value="<?= (isset($filters['search'])) ? $filters['search'] : '' ?>" class="form-control cstm-border-left-radius0" id="nav-search">
        </div>
        <div class="searchBtn">
            <a onclick="filterPosts()" role="button"><button class="btn btn-post">Find</button></a>
            <!-- <button class="btn" onclick="filterPosts()">Find</button> -->
        </div>
    </div>

    <ul class="d-flex gap-3 align-items-center top-nav-listing justify-content-end pad-0">
        <li class="hide-l"><img src="<?= base_url(); ?>/public/images/icons/target.svg" width="20px"></li>
        <li class="hide-m"><a href="<?= base_url() . "/allnotifications" ?>"><i class="bi bi-bell"></i></a></li>
        <li class="hide-l"><i class="bi bi-geo-alt"></i></li>
        <li><i class="bi bi-cart"></i></li>
        <li class="hide-l"><i class="bi bi-person-circle"></i></li>
        <li class="hide-l"><i class="bi bi-person-circle"></i></li>
        <?php
        $session = session();
        if ($session->get('id')) {
        ?>
            <!-- <li class="login-link dropdown show"><a href="<?php echo base_url(); ?>/profile" ><?= $session->get('first_name') ?> </a>
                        
                    </li> -->
            <li class="hide-l"><i class="bi bi-person-circle"></i></li>
            <li class="login-link">
                <a href="<?= base_url(); ?><?php
                                            if ($session->get('customer_type') == '1') {
                                                echo '/seller/profile';
                                            } else {
                                                echo '/profile';
                                            }
                                            ?>  
                        ">
                    <img src="<?php echo base_url(); ?>/public/image/1.png" style="width:35px; border-radius:50%;">
                    <i class="bi bi-chevron-down"></i>
                </a>
            </li>
        <?php
        } else {
        ?>
            <li class="login-link"><a href="<?php echo base_url(); ?>/login">Login

                </a></li>
        <?php
        }
        ?>


        <li><a href="<?= base_url('/seller/add-product'); ?>"><button class="btn btn-post">Post Ad</button></a></li>
    </ul>
</div>

<div class="hide-d">
    <div class="sub-header gap-3">
        <div class="flx-grow">
            <input type="search" class="search-box-m" placeholder="Search Products">
        </div>
        <div class="flx-grow">
            <button type="submit" class="filter-box-m"></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const zipElement = $('#nav-zipcode');
        zipElement.autocomplete({
            minLength: 3,
            source: function(request, response) {
                $.ajax({
                    url: "<?= base_url() ?>/get-zipcodes",
                    method: 'get',
                    dataType: 'json',
                    data: request,
                    success: function(data) {
                        response($.map(data, function(value, key) {
                            return {
                                label: value.name + " - " + value.zipcode,
                                value: value.name + " - " + value.zipcode,
                                id: value.id
                            };
                        }));
                    }
                });
            },
            change: function(event, ui) {
                zipElement.attr("data-id", 0)
                filterPosts()
            },
            focus: function(event, ui) {
                zipElement.val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                zipElement.val(ui.item.label)
                zipElement.attr("data-id", ui.item.id)
                filterPosts()
            }
        });
    });

    $('#nav-search').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which)
        if (keycode == '13') {
            filterPosts()
        }
    });

    function filterPosts() {
        const zip = parseInt($("#nav-zipcode").attr("data-id"))
        const distance = parseInt($("#nav-distance").val())
        const category = parseInt($("#nav-category").val())
        const search = $("#nav-search").val()

        let obj = {
            zip,
            distance,
            category,
            search
        }

        if (zip == 0) {
            delete obj.zip
            delete obj.distance
        }
        if (distance == 0)
            delete obj.distance
        if (category == 0)
            delete obj.category
        if (search == "")
            delete obj.search

        let string = ''
        if (Object.keys(obj).length !== 0) {
            string = `<?= base_url(); ?>?` + $.param(obj)
        } else {
            string = `<?= base_url(); ?>`
        }

        window.location = string
    }
</script>