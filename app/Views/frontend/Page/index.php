<?php echo $this->render('include/header'); ?>
<?php echo $this->render('include/navbar'); ?>
<style>
    .main-section {
        width: 80%;
    }

    .productbox img {
        width: 100%;
        height: 225px;
    }
</style>
<div class="main">
    <!-- Mobile Menu -->
    <?php echo $this->render('include/m-sidebar'); ?>
    <!---------main Sidebar--------------->
    <?php echo $this->render('include/sidebar'); ?>
    <input type="hidden" id="subCategoryId" value="<?= (isset($filters['subCategory'])) ? $filters['subCategory'] : 0 ?>" />
    <div class="main-section" id="postListing">
        <div id="highlightDiv">


        </div>
        <div class="grid-view" id="postList">

        </div>
        <div class="d-flex justify-content-center mt-4 mb-4">
            <input type="hidden" name="limit" id="limit" value="10" />
            <input type="hidden" name="offset" id="offset" value="20" />
            <button id="loadMoreBtn" onclick="loadMorePosts(this)" class="btn btn-loadmore" style="display:none;">Load More</button>
        </div>
        <!--- Yellow Footer --->
        <div class="yellow-footer">
            <div class="logo">
                <figure>
                    <img src="<?php echo base_url(); ?>/public/images/why-logo.png">
                </figure>
            </div>
            <div class="btn-area">
                <button class="btn btn-knowmore">Know More</button>
            </div>
            <div class="free-shipping text-center">
                <figure class="icon">
                    <img src="<?php echo base_url(); ?>/public/images/icons/free-shipping.svg">
                </figure>
                <h5>Free Shipping</h5>
                <p>Free delivery for all orders</p>
            </div>
            <div class="money text-center">
                <figure class="icon">
                    <img src="<?php echo base_url(); ?>/public/images/icons/money.svg">
                </figure>
                <h5>Money Guarantee</h5>
                <p>30 days money back</p>
            </div>
            <div class="support text-center">
                <figure class="icon">
                    <img src="<?php echo base_url(); ?>/public/images/icons/suppoort.svg">
                </figure>
                <h5>24/7 Support</h5>
                <p>Friendly 24/7 support</p>
            </div>
            <div class="secure-payment text-center">
                <figure class="icon">
                    <img src="<?php echo base_url(); ?>/public/images/icons/payment.svg">
                </figure>
                <h5>Secure Payment</h5>
                <p>All cards accepted</p>
            </div>
        </div>
        <!--------------------->
    </div>
</div>


<?php echo $this->render('include/footer'); ?>
<script>
    $(document).ready(function() {
        const category = $("#nav-category").val()
        if (category == 0) {
            getHighlightedPosts()
            getPosts(1, 'exceptHighlight')
        } else {
            getPosts(1, 'allPosts')
        }
    });

    function getHighlightedPosts() {
        const base_url = '<?= base_url(); ?>';
        const zip = $("#nav-zipcode").attr("data-id")
        const distance = $("#nav-distance").val()
        const category = $("#nav-category").val()
        const subCategory = $("#subCategoryId").val()
        const search = $("#nav-search").val()
        $.ajax({
            url: `${base_url}/get-posts`,
            method: 'get',
            data: {
                filters: {
                    zip,
                    distance,
                    category,
                    subCategory,
                    search,
                    postType: 'highlight',
                    pagination: false
                }
            },
            dataType: "json",
            success: function(result) {
                if (result) {
                    if (result.posts) {
                        const posts = result.posts
                        if (posts.length > 0) {
                            let highlightedString = ""
                            $.each(posts, function(i, element) {
                                let image = ""
                                if (element.images) {
                                    image = element.images.split(",")[0]
                                }
                                const amount = element.amount + "/" + element.duration
                                const address = element.city_name + ", " + element.state_name + ", " + element.country_name

                                highlightedString += '<div class="productbox">' +
                                    '<figure>' +
                                    '<a href="' + base_url + '/product/' + element.id + '"> <img class="is_lessthen" src="' + base_url + '/public/uploads/seller-products/' + image + '"></a>' +
                                    '</figure>' +
                                    '<label>' + element.category_name + '</label>' +
                                    '<div class="d-flex justify-content-between align-items-center">' +
                                    '<a href="' + base_url + '/product/' + element.id + '">' +
                                    '<h4>' + element.title + '</h4>' +
                                    '</a>' +
                                    '<span>$' + amount + '</span>' +
                                    '</div>' +
                                    '<label>' +
                                    '<i class="bi bi-geo-alt"></i>' + address +
                                    '</label>' +
                                    '</div>';
                            });

                            let finalString = `<div class="bg-yellow" id="highlightDiv">
                                    <h4 class="slick-heading">Highlight</h4>
                                    <div class="regular slider d-flex" id="highlightedPosts">
                                        ${highlightedString}
                                    </div>
                                </div>`
                            $('#highlightDiv').append(finalString);
                        } else {
                            $("#highlightDiv").css("display", "none");
                        }
                    }
                }
            }
        });
    }

    function getPosts(page, postType) {
        const base_url = '<?= base_url(); ?>';
        let order = 'asc'
        const zip = $("#nav-zipcode").attr("data-id")
        const distance = $("#nav-distance").val()
        const category = $("#nav-category").val()
        const subCategory = $("#subCategoryId").val()
        const search = $("#nav-search").val()
        const minPrice = $("#minPrice").val()
        const maxPrice = $("#maxPrice").val()
        let brands = [];
        $('input[name="brands"]:checked').each(function() {
            brands.push(this.value);
        });
        if (category == 0) {
            order = 'desc'
        }

        $.ajax({
            url: `${base_url}/get-posts`,
            method: 'get',
            data: {
                filters: {
                    zip,
                    distance,
                    category,
                    subCategory,
                    search,
                    brands: JSON.stringify(brands),
                    minPrice,
                    maxPrice,
                    postType,
                    page,
                    order,
                    pagination: true
                }
            },
            dataType: "json",
            success: function(result) {
                if (result) {
                    if (result.posts) {
                        const posts = result.posts
                        let postsString = ""
                        $.each(posts, function(i, element) {
                            let image = ""
                            if (element.images) {
                                image = element.images.split(",")[0]
                            }
                            const amount = element.amount + "/" + element.duration
                            const address = element.city_name + ", " + element.state_name + ", " + element.country_name

                            postsString += '<div class="productbox">' +
                                '<figure>' +
                                '<a href="' + base_url + '/product/' + element.id + '"> <img class="is_lessthen" src="' + base_url + '/public/uploads/seller-products/' + image + '"></a>' +
                                '</figure>' +
                                '<label>' + element.category_name + '</label>' +
                                '<div class="d-flex justify-content-between align-items-center">' +
                                '<a href="' + base_url + '/product/' + element.id + '">' +
                                '<h4>' + element.title + '</h4>' +
                                '</a>' +
                                '<span>$' + amount + '</span>' +
                                '</div>' +
                                '<label>' +
                                '<i class="bi bi-geo-alt"></i>' + address +
                                '</label>' +
                                '</div>';
                        });
                        $('#postList').append(postsString);

                        $("#loadMoreBtn").css("display", "block")
                        if (posts.length < result.perPage) {
                            $("#loadMoreBtn").css("display", "none")
                        }
                        $("#loadMoreBtn").val(result.page)
                        $("#loadMoreBtn").attr("data-postType", result.postType)
                    }
                }
            }
        });
    }

    function loadMorePosts(event) {
        const page = $(event).val()
        const postType = $(event).attr('data-postType')
        getPosts(page, postType)
    }
</script>