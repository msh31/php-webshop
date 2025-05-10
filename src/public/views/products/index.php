<?php
require_once ROOT_PATH . '/public/views/includes/header.php';
?>

    <div class="container py-5">
        <h1 class="page-title mb-4">Our Products</h1>

        <!-- Product Filters / Sorting -->
        <div class="mb-4">
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Search products..." id="searchInput">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                </div>

                <select class="form-select" style="max-width: 200px;">
                    <option value="">All Categories</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                </select>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm product-card">
                            <!-- Product Image -->
                            <div class="product-image-container">
                                <?php if (!empty($product['image_url'])): ?>
                                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo BASE_URL; ?>public/assets/images/placeholder.jpg" class="card-img-top" alt="Product image placeholder">
                                <?php endif; ?>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>

                                <p class="card-text text-muted flex-grow-1">
                                    <?php echo strlen($product['description']) > 100 ?
                                        htmlspecialchars(substr($product['description'], 0, 100)) . '...' :
                                        htmlspecialchars($product['description']); ?>
                                </p>

                                <!-- Price and Stock -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fs-5 fw-bold price-tag">€<?php echo number_format($product['price'], 2); ?></span>

                                    <?php if ($product['stock'] > 0): ?>
                                        <span class="badge badge-success">In Stock (<?php echo $product['stock']; ?>)</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Out of Stock</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                                <a href="<?php echo BASE_URL . 'products/' . $product['id']; ?>" class="btn btn-sm btn-outline-primary">Details</a>

                                <?php if (isLoggedIn() && $product['stock'] > 0): ?>
                                    <form action="<?php echo BASE_URL; ?>cart/add" method="post" class="d-inline">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </form>
                                <?php elseif (!isLoggedIn()): ?>
                                    <button class="btn btn-sm btn-primary" onclick="alert('Please log in to add items to your cart')">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>Out of Stock</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        No products found. Please check back later.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php
require_once ROOT_PATH . '/public/views/includes/footer.php';
?>