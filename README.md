# CodesWholesale for WooCommerce Update product on save post
Add action when saving post so that product is updated with price an stock from codeswholesale

## Requirements
Codeswholesale for Woocommerce plugin

## Installation
### Fix code mistakes in main plugin
Fix these code mistakes in CodesWholesale plugin

```php
class UpdatePriceAndStockAction implements Action {
    ...
    public function process() {
        ...
        // Replace this
        $cwProductId = $this->connection->receiveUpdatedProductId();
        // With this
        $this->setProductId($this->connection->receiveUpdatedProductId());
        ...
        // Replace this
        $product = \CodesWholesale\Resource\Product::get($cwProductId);
        // With this
        $product = \CodesWholesale\Resource\Product::get($this->cwProductId);
        ...
        // Replace this
        die("Received product id: " . $cwProductId . " Error: " . $e->getMessage());
        // With this
        die("Received product id: " . $this->cwProductId . " Error: " . $e->getMessage());
        ...
        // Replace this
        $this->productUpdater->updateProduct($cwProductId, $quantity , $priceSpread);
        // With this
        
    }
}

```

### Upload and install the plugin in wordpress
1. Download git repository as zip.
2. Go to wordpress admin -> plugins and upload the plugin.
3. Activate plugin.