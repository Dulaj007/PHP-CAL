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
            padding: 0.6rem 1.2rem;
            margin: 0.5rem;
            border: none;
            border-radius: 30px;
            background: #ffffff10;
            color: white;
            font-size: 0.95rem;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            cursor: pointer;
            
        }
        input:hover, select:hover, .submit-btn:hover {
            background: #ffffff20;
            transform: scale(1.05);
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
        }
        .result {
        margin-top: 20px;
        padding: 10px 15px;
        width: fit-content; 
        background-color: #ffffff10;
        font-weight: bold;
        margin-left: auto;
        margin-right: auto; /* centers the result box */
        border-radius: 20px;
        }
        .result.success {
            color: white;
            background-color: #ffffff10; 
        }

        .result.error {
            color: darkred;
        
        }

        .cursor-effect { /* Mouse course dark theme effect */
        position: fixed;
        top: 0;
        left: 0;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.07);
        border-radius: 50%;
        pointer-events: none;
        filter: blur(50px);
        z-index: 999;
        transform: translate(-100px, -100px); /* center it */
        opacity: 0; /* hidden by default */
        transition: opacity 0.3s ease;
        will-change: transform;
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
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
    // Check if message contains 'Answer:' to detect success
    $isAnswer = strpos($message, 'Answer:') !== false;

    // Assign class based on message type
    $class = $isAnswer ? 'result success' : 'result error';

    echo "<div class=\"$class\">$message</div>";
}
?>

    <div class="cursor-effect"></div>
      <script>
    const cursor = document.querySelector('.cursor-effect');
    const radius = 100;

    document.addEventListener('mousemove', (e) => {
      cursor.style.opacity = '1';
   
      cursor.style.transform = `translate(${e.clientX - radius}px, ${e.clientY - radius}px)`;
    });

    document.body.addEventListener('mouseleave', () => {
      cursor.style.opacity = '0';
    });

    document.body.addEventListener('mouseenter', () => {
      cursor.style.opacity = '1';
    });
  </script>
</body>
</html>
