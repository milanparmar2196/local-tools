<div class="sidebar">
    <ul>
        <?php
        if (isset($cat_subcategories)) {
        ?>
            <li>
                <a role="button" onclick="categoryFilter(<?= $cat_subcategories->id ?>)">
                    <img src="<?php echo base_url(); ?>/public/images/icons/<?= $cat_subcategories->icon ?>"><b><?= $cat_subcategories->name; ?></b>
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
                            <a role="button" onclick="subCategoryFilter(<?= $subCategory['id'] ?>)" class="<?= $active ?>">
                                <img src="<?php echo base_url(); ?>/public/images/icons/<?= $subCategory['icon'] ?>"><?= $subCategory['name']; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
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
</script>