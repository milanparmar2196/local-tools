<!-- Mobile Menu -->
<div class="m-sidebar" id="MSidebar">
    <div class="menu-header">
        <div class="menu-logo">
            <img src="<?= base_url(); ?>/public/images/logo.svg">
        </div>
        <div class="push-menu">
            <a href="javascript:void(0)" onclick="closeNav()"><img src="<?= base_url(); ?>/public/images/icons/menu.svg"></a>
        </div>
    </div>
    <ul>
        <?php
        if (isset($subCategoryFlag) && $subCategoryFlag == true) {
            if (isset($cat_subcategories)) {
        ?>
                <li>
                    <a role="button" onclick="categoryFilter(<?= $cat_subcategories->id ?>)">
                        <b><?= $cat_subcategories->name; ?></b>
                    </a>
                    <ul>
                        <?php
                        foreach ($cat_subcategories->subCategories as $subCategory) {
                            $active = '';
                            if ($subCategory['id'] == $filters['subCategory']) {
                                $active = 'active';
                            }
                        ?>
                            <li>
                                <div class="form-check">
                                    <a role="button" onclick="subCategoryFilter(<?= $subCategory['id'] ?>)" class="<?= $active ?>">
                                        <label class="form-check-label"><?= $subCategory['name']; ?></label>
                                    </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            if (isset($brands)) {
            ?>
                <li>
                    <a>
                        <b>Brands</b>
                    </a>
                    <ul>
                        <?php
                        foreach ($brands as $brand) {
                            $checked = '';
                            if ($filters['brands'] != 0 && in_array($brand['id'], $filters['brands'])) {
                                $checked = 'checked';
                            }
                        ?>
                            <li>
                                <div class="form-check">
                                    <a>
                                        <input class="form-check-input" type="checkbox" name="brands" id="brand-<?= $brand['id'] ?>" value="<?= $brand['id'] ?>" <?= $checked ?> onchange="brandFilter()">
                                        <label class="form-check-label" for="brand-<?= $brand['id'] ?>"><?= $brand['name'] ?></label>
                                    </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            ?>
            <li>
                <a>
                    <b>Price</b>
                </a>
                <ul>
                    <li>
                        <div class="price-wrapper">
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" value="<?= $filters['minPrice'] ?>" id="minPrice" readonly>
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" value="<?= ($filters['maxPrice'] != 0) ? $filters['maxPrice'] : 100000 ?>" id="maxPrice" readonly>
                                </div>
                            </div>
                            <div class="price-slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="100000" value="<?= $filters['minPrice'] ?>" step="100" onchange="priceFilter()">
                                <input type="range" class="range-max" min="0" max="100000" value="<?= ($filters['maxPrice'] != 0) ? $filters['maxPrice'] : 100000 ?>" step="100" onchange="priceFilter()">
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <?php
        } else {
            if (isset($categories)) {
                foreach ($categories as $category) {
            ?>
                    <li>
                        <a role="button" onclick="categoryFilter(<?= $category['id'] ?>)">
                            <img src="<?php echo base_url(); ?>/public/images/icons/<?= $category['icon'] ?>"><?= $category['name']; ?>
                        </a>
                    </li>
        <?php
                }
            }
        }
        ?>
    </ul>
</div>
<!------------------------>

<div class="sidebar">
    <ul>
        <?php
        if (isset($subCategoryFlag) && $subCategoryFlag == true) {
            if (isset($cat_subcategories)) {
        ?>
                <li>
                    <a role="button" onclick="categoryFilter(<?= $cat_subcategories->id ?>)">
                        <b><?= $cat_subcategories->name; ?></b>
                    </a>
                    <ul>
                        <?php
                        foreach ($cat_subcategories->subCategories as $subCategory) {
                            $active = '';
                            if ($subCategory['id'] == $filters['subCategory']) {
                                $active = 'active';
                            }
                        ?>
                            <li>
                                <div class="form-check">
                                    <a role="button" onclick="subCategoryFilter(<?= $subCategory['id'] ?>)" class="<?= $active ?>">
                                        <label class="form-check-label"><?= $subCategory['name']; ?></label>
                                    </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            if (isset($brands)) {
            ?>
                <li>
                    <a>
                        <b>Brands</b>
                    </a>
                    <ul>
                        <?php
                        foreach ($brands as $brand) {
                            $checked = '';
                            if ($filters['brands'] != 0 && in_array($brand['id'], $filters['brands'])) {
                                $checked = 'checked';
                            }
                        ?>
                            <li>
                                <div class="form-check">
                                    <a>
                                        <input class="form-check-input" type="checkbox" name="m-brands" id="brand-<?= $brand['id'] ?>" value="<?= $brand['id'] ?>" <?= $checked ?> onchange="brandFilter('mobile')">
                                        <label class="form-check-label" for="brand-<?= $brand['id'] ?>"><?= $brand['name'] ?></label>
                                    </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            ?>
            <li>
                <a>
                    <b>Price</b>
                </a>
                <ul>
                    <li>
                        <div class="price-wrapper">
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" value="<?= $filters['minPrice'] ?>" id="minPrice" readonly>
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" value="<?= ($filters['maxPrice'] != 0) ? $filters['maxPrice'] : 100000 ?>" id="maxPrice" readonly>
                                </div>
                            </div>
                            <div class="price-slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="100000" value="<?= $filters['minPrice'] ?>" step="100" onchange="priceFilter()">
                                <input type="range" class="range-max" min="0" max="100000" value="<?= ($filters['maxPrice'] != 0) ? $filters['maxPrice'] : 100000 ?>" step="100" onchange="priceFilter()">
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <?php
        } else {
            if (isset($categories)) {
                foreach ($categories as $category) {
            ?>
                    <li>
                        <a role="button" onclick="categoryFilter(<?= $category['id'] ?>)">
                            <img src="<?php echo base_url(); ?>/public/images/icons/<?= $category['icon'] ?>"><?= $category['name']; ?>
                        </a>
                    </li>
        <?php
                }
            }
        }
        ?>
    </ul>
</div>

<div class="profile-sidebar">
    <div class="main-div-sidebar">
        <div class="menu-header">
            <div class="menu-logo">
                <a href="#"><img src="<?= base_url(); ?>/public/images/logo.svg"></a>
            </div>
            <div class="push-menu profile-menu">
                <!-- <a href="" class=""><i class="bi bi-person-circle"></i></a> -->
                    <img src="<?php echo base_url(); ?>/public/image/1.png" style="width:35px; border-radius:50%;">
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="post-add">
            <a href="<?= base_url('/seller/add-product'); ?>">Post Ad</a>
        </div>
        <ul>
            <!-- <li><a href="#"><img src="images/icons/business.png">Business Account</a></li> -->
            <li><a href="<?= base_url(); ?>/seller/manage-profile"><img src="<?= base_url(); ?>/public/images/icons/profile.png">Profile Information</a></li>
            <li><a href="<?= base_url(); ?>/seller/change-password"><img src="<?= base_url(); ?>/public/images/icons/password.png">Change Password</a></li>
            <li><a href="<?= base_url(); ?>/seller/document"><img src="<?= base_url(); ?>/public/images/icons/documents.png">Documents</a></li>
            <li><a href="<?= base_url(); ?>/seller/seller-account"><img src="<?= base_url(); ?>/public/images/icons/seller.png">Seller Account</a></li>
            <!-- <li><a href="#"><img src="images/icons/buyer.png">Buyer Account</a></li> -->
            <li><a href="<?= base_url(); ?>/payments"><img src="<?= base_url(); ?>/public/images/icons/payment.png">Payment</a></li>
            <!-- <li><a href="#"><img src="images/icons/cart.png">Cart</a></li> -->
            <li><a href="<?= base_url(); ?>/notification"><img src="<?= base_url(); ?>/public/images/icons/notification.png">Notification</a></li>
            <!-- <li><a href="#"><img src="images/icons/wishlist.png">Wishlist</a></li> -->
            <li><a href="<?= base_url(); ?>/logout"><img src="<?= base_url(); ?>/public/images/icons/logout.png">Logout</a></li>
        </ul>
    </div>
</div>

<script>
    function categoryFilter(categoryId) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.delete('sub-category');
        urlParams.set('category', categoryId);
        window.location.search = urlParams;
    }

    function subCategoryFilter(subCategoryId) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sub-category', subCategoryId);
        window.location.search = urlParams;
    }

    function brandFilter(type = '') {
        let brands = [];
        if (type == 'mobile') {
            $('input[name="m-brands"]:checked').each(function() {
                brands.push(this.value);
            });
        } else {
            $('input[name="brands"]:checked').each(function() {
                brands.push(this.value);
            });
        }
        const urlParams = new URLSearchParams(window.location.search);
        if (brands.length > 0) {
            const brandString = brands.join(',')
            urlParams.set('brands', brandString);
            window.location.search = urlParams;
        } else {
            urlParams.delete('brands');
            window.location.search = urlParams;
        }
    }

    function priceFilter() {
        const minPrice = $("#minPrice").val()
        const maxPrice = $("#maxPrice").val()
        const minMaxPrice = minPrice + ':' + maxPrice
        const urlParams = new URLSearchParams(window.location.search);
        if (minPrice == 0 && maxPrice == 100000) {
            urlParams.delete('price');
        } else {
            urlParams.set('price', minMaxPrice);
        }
        window.location.search = urlParams;
    }

    $(document).ready(function() {
        $(".profile-menu").click(function() {
            $(".profile-sidebar").toggleClass('intro');
        });

        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".price-slider .progress");
        let priceGap = 100;
        // priceInput.forEach(input =>{
        //     input.addEventListener("input", e =>{
        //         let minPrice = parseInt(priceInput[0].value),
        //         maxPrice = parseInt(priceInput[1].value);

        //         if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
        //             if(e.target.className === "input-min"){
        //                 rangeInput[0].value = minPrice;
        //                 range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
        //             }else{
        //                 rangeInput[1].value = maxPrice;
        //                 range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        //             }
        //         }
        //     });
        // });
        range.style.left = ((rangeInput[0].value / rangeInput[0].max) * 100) + "%";
        range.style.right = 100 - (rangeInput[1].value / rangeInput[1].max) * 100 + "%";
        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);
                if ((maxVal - minVal) < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    })
</script>