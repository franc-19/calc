<!--
  All rights reserved by Franc.
  Unauthorized copying or distribution of this code is strictly prohibited.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multipurpose Calculator</title>
  <!-- Google Fonts for a modern look -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* 
      All rights reserved by Franc.
      Internal CSS for the Multipurpose Calculator.
    */

    /* Import and use the Poppins font */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* Container for the calculator card */
    .container {
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 420px;
      text-align: center;
      animation: fadeIn 1s ease-out;
    }

    /* Animated title with a slight bounce */
    .animated-title {
      font-size: 2rem;
      margin-bottom: 25px;
      color: #333;
      animation: bounceIn 1s;
    }

    /* Form group spacing */
    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    /* Label styling */
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #555;
    }

    /* Input, select styling */
    input[type="text"],
    input[type="number"],
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Focus effects for inputs and selects */
    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.3);
      outline: none;
    }

    /* Submit button styling */
    input[type="submit"] {
      background-color: #2575fc;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      width: 100%;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* Hover and active effects for the submit button */
    input[type="submit"]:hover {
      background-color: #1f65d2;
      transform: translateY(-2px);
    }

    input[type="submit"]:active {
      transform: translateY(0);
    }

    /* Styling for the result display */
    .result {
      margin-top: 25px;
      font-size: 1.2rem;
      color: #333;
      background: #f1f1f1;
      padding: 15px;
      border-radius: 8px;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Footer styling */
    .footer {
      margin-top: 20px;
      font-size: 0.9rem;
      color: #fff;
      text-align: center;
    }

    /* Fade-in animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Bounce-in animation for the title */
    @keyframes bounceIn {
      0% {
        transform: scale(0.3);
        opacity: 0;
      }
      50% {
        transform: scale(1.05);
        opacity: 1;
      }
      70% {
        transform: scale(0.9);
      }
      100% {
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="animated-title">Multipurpose Calculator</h1>
    <form method="post" action="">
      <div class="form-group">
        <label for="num1">Number 1:</label>
        <input type="text" name="num1" id="num1" required>
      </div>
      <div class="form-group">
        <label for="num2">Number 2:</label>
        <input type="number" step="any" name="num2" id="num2">
      </div>
      <div class="form-group">
        <label for="operation">Choose an operation:</label>
        <select name="operation" id="operation" required>
          <option value="add">Add (+)</option>
          <option value="subtract">Subtract (-)</option>
          <option value="multiply">Multiply (*)</option>
          <option value="divide">Divide (/)</option>
          <option value="exponent">Exponent (^)</option>
          <option value="percent">Percentage (%)</option>
          <option value="root">Square Root (√)</option>
          <option value="logarithm">Logarithm (log)</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Calculate">
      </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      // Convert inputs to floats for numeric operations
      $num1 = floatval($_POST['num1']);
      $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
      $operation = $_POST['operation'];
      $result = '';

      switch ($operation) {
        case 'add':
          $result = $num1 + $num2;
          break;
        case 'subtract':
          $result = $num1 - $num2;
          break;
        case 'multiply':
          $result = $num1 * $num2;
          break;
        case 'divide':
          $result = ($num2 == 0) ? "Error: Division by zero." : $num1 / $num2;
          break;
        case 'exponent':
          $result = pow($num1, $num2);
          break;
        case 'percent':
          $result = ($num1 * $num2) / 100;
          break;
        case 'root':
          $result = ($num1 < 0) ? "Error: Cannot take the square root of a negative number." : sqrt($num1);
          break;
        case 'logarithm':
          $result = ($num1 <= 0 || $num2 <= 0 || $num2 == 1) ? "Error: Invalid input for logarithm." : log($num1, $num2);
          break;
        default:
          $result = "Invalid operation selected.";
          break;
      }
      echo '<h2 class="result">Result: ' . htmlspecialchars($result) . '</h2>';
    }
    ?>
  </div>
  
  <footer class="footer">
    &copy; 2025 All rights reserved by Franc.
  </footer>
</body>
</html>
