<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Secure PHP Calculator</title>
    <style>
        body{
            font-family: 'Montserrat', Arial, sans-serif;
            padding:20px;
            text-align: center;
            background: black;
        }
        h2{
            text-transform: uppercase;
            color: white;
          
            
        }
        input, select, .submit-btn {
            margin: 10px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid rgba(242, 242, 242, 0.44);
            border-radius: 15px;
            background:transparent;
            color:white;
            padding:15px;
            
        }
      option {
            background-color: black;
  
        }
        .submit-btn{
            transition: transform 0.3s ease;
            text-transform: uppercase;
          
        }
        .submit-btn:hover{
            background:rgba(242, 242, 242, 0.16);
            cursor: pointer;
            transform: scale(1.05);


        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>PHP Calculator</h2>
    <form action="calculate.php" method="POST">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <br>
        <button type="submit" class="submit-btn">Calculate</button>
    </form>

    <?php
    // Display result or error if redirected back
    if (isset($_GET['message'])) {
        echo '<div class="result">' . htmlspecialchars($_GET['message']) . '</div>';
    }
    ?>
</body>
</html>
