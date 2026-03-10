<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit(); }
if (isset($_POST['logout'])) { session_destroy(); header("Location: login.php"); exit(); }
$usd_to_php = 57; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <title>Problem Solver Dashboard</title>
</head>
<body class="dashboard-body">
    <audio id="bgMusic" autoplay loop><source src="webmusic.mp3" type="audio/mpeg"></audio>

    <div class="shop-wrapper">
        <div id="shop-container" class="main-container shop-container">
            <div class="scrollable-content">
                
                <?php 
                $original_items = [
                    ['name' => 'BSODA', 'price' => 0.25, 'img' => 'bsoda.png', 'desc' => 'Great for pushing away bullies!'],
                    ['name' => 'Dirty Chalk Eraser', 'price' => 1.00, 'img' => 'eraser.png', 'desc' => 'Creates a cloud of dust to hide in!'],
                    ['name' => 'Safety Scissors', 'price' => 0.50, 'img' => 'scis.png', 'desc' => 'Snip snip! Useful for jump ropes!']
                ];
                
                $new_items = [
                    ['name' => 'Energy Flavoured Zesty Bar', 'price' => 0.50, 'img' => 'zest.png', 'desc' => 'Fills your stamina instantly!'],
                    ['name' => 'Quarter', 'price' => 0.25, 'img' => 'quart.png', 'desc' => 'Can be used in vending machines!'],
                    ['name' => 'An apple for b̸̢͙̟̲͛̎̄̍͆͝ẳ̶̡͇̼̳̼̳̈̈́̏̊̎̈́̌̓̈̈́͛͠ḽ̵̛͙͔͚̲͖̪̩̇̐͛̔̎͛̿̎̚͘͘͝d̶̦̰̤̩̟̟̓̒̄͐͐ĩ̷͉̬̜̠̼̦̥̘̖͚̏͗̆͘̕͜͠ your teacher!', 'price' => 99.00, 'img' => 'app.png', 'desc' => 'A tasty treat for your favorite teacher.']
                ];

                $all_items = array_merge($original_items, $new_items);

                foreach ($all_items as $item): ?>
                <div class="shop-item">
                    <img src="<?php echo $item['img']; ?>" class="item-icon">
                    <div class="item-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <p>$<?php echo number_format($item['price'], 2); ?> / ₱<?php echo $item['price'] * $usd_to_php; ?></p>
                        
                        <a href="javascript:void(0)" onclick="showDetails('<?php echo addslashes($item['name']); ?>', '<?php echo $item['price']; ?>', '<?php echo $item['img']; ?>', '<?php echo addslashes($item['desc']); ?>')" class="info-link">Click here for more info!</a>
                        
                        <div class="controls">
                            <img src="frame_00003.png" class="btn-action btn-outline" alt="Add">
                            <img src="frame_00004.png" class="btn-action btn-outline" alt="Remove">
                            <span class="status-text">In Cart: 0 In Stock: 99</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div id="detail-view" class="main-container detail-container" style="display: none;">
            <div class="detail-layout">
                <div class="detail-left">
                    <div class="detail-frame">
                        <img id="detail-img" src="" alt="Product">
                    </div>
                    <div class="go-back-btn" onclick="showShop()">
                        <img src="back.png" alt="Back">
                        <p>go back</p>
                    </div>
                </div>
                <div class="detail-right">
                    <h2 id="detail-title" class="chalk-text"></h2>
                    <p id="detail-price" class="status-text"></p>
                    <div class="description-box">
                        <p id="detail-desc">(Description)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="nav-group">
                <img src="frame_00005.png" alt="View Cart" class="large-nav-icon">
                <p>View Cart</p>
            </div>
            <div class="nav-group">
                <img src="frame_00006.png" alt="Checkout" class="large-nav-icon">
                <p>Checkout</p>
            </div>
            <div class="volume-container">
                <label>Baldi's Webtime Song!</label>
                <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.5">
            </div>
            <form method="POST"><button type="submit" name="logout" id="logoutBtn">Log Out!</button></form>
        </div>
    </div>

    <script>
    function showDetails(name, price, img, desc) {
        document.getElementById('shop-container').style.display = 'none';
        document.getElementById('detail-view').style.display = 'flex';
        
        document.getElementById('detail-title').innerText = name;
        document.getElementById('detail-img').src = img;
        document.getElementById('detail-price').innerText = '$' + parseFloat(price).toFixed(2) + ' / ₱' + (price * 57);
        document.getElementById('detail-desc').innerText = desc;
    }

    function showShop() {
        document.getElementById('detail-view').style.display = 'none';
        document.getElementById('shop-container').style.display = 'block';
    }

    const audio = document.getElementById('bgMusic');
    const slider = document.getElementById('volumeSlider');
    
    
    slider.addEventListener('input', () => { audio.volume = slider.value; });

   
    document.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
        }
    }, { once: true });
</script>
</body>
</html>