<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometry Calculator</title>
    <link rel="stylesheet" href="calculator.css"> <!-- Link to the CSS file -->
</head>
<body>
    <h1>Geometry Calculator</h1>

    <form method="post">
        <label for="operation">Select Calculation:</label>
        <select name="operation" id="operation" required>
            <option value="area_circle">Area of a Circle</option>
            <option value="circumference_circle">Circumference of a Circle</option>
            <option value="area_rectangle">Area of a Rectangle</option>
            <option value="perimeter_rectangle">Perimeter of a Rectangle</option>
            <option value="area_triangle">Area of a Triangle</option>
            <option value="perimeter_triangle">Perimeter of a Triangle</option>
            <option value="volume_sphere">Volume of a Sphere</option>
            <option value="surface_sphere">Surface Area of a Sphere</option>
            <option value="volume_cylinder">Volume of a Cylinder</option>
            <option value="surface_cylinder">Surface Area of a Cylinder</option>
        </select>

        <div id="parameters">
            <!-- Inputs will be dynamically added here based on the selected operation -->
        </div>

        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $operation = $_POST['operation'];

        // Function to handle calculations
        function calculate($operation) {
            switch ($operation) {
                case 'area_circle':
                    $radius = $_POST['radius'];
                    return pi() * pow($radius, 2);

                case 'circumference_circle':
                    $radius = $_POST['radius'];
                    return 2 * pi() * $radius;

                case 'area_rectangle':
                    $length = $_POST['length'];
                    $width = $_POST['width'];
                    return $length * $width;

                case 'perimeter_rectangle':
                    $width = $_POST['width'];
                    return 2 * ($length + $width);

                case 'area_triangle':
                    $base = $_POST['base'];
                    $height = $_POST['height'];
                    return 0.5 * $base * $height;

                case 'perimeter_triangle':
                    $side1 = $_POST['side1'];
                    $side2 = $_POST['side2'];
                    $side3 = $_POST['side3'];
                    return $side1 + $side2 + $side3;

                case 'volume_sphere':
                    $radius = $_POST['radius'];
                    return (4/3) * pi() * pow($radius, 3);

                case 'surface_sphere':
                    $radius = $_POST['radius'];
                    return 4 * pi() * pow($radius, 2);

                case 'volume_cylinder':
                    $radius = $_POST['radius'];
                    $height = $_POST['height'];
                    return pi() * pow($radius, 2) * $height;

                case 'surface_cylinder':
                    $radius = $_POST['radius'];
                    $height = $_POST['height'];
                    return 2 * pi() * $radius * ($radius + $height);

                default:
                    return "Invalid operation";
            }
        }

        // Display the result of the calculation
        $result = calculate($operation);
        echo "<h2>Result: $result</h2>";

        // Option to restart or exit
        echo '<a href="">Perform another calculation</a>';
    }
    ?>

    <script>
        // JavaScript to dynamically change input fields based on the selected operation
        document.getElementById('operation').addEventListener('change', function() {
            const operation = this.value;
            const parametersDiv = document.getElementById('parameters');

            let html = '';
            if (operation === 'area_circle' || operation === 'circumference_circle') {
                html = '<label>Radius: </label><input type="number" name="radius" required>';
            } else if (operation === 'area_rectangle' || operation === 'perimeter_rectangle') {
                html = '<label>Length: </label><input type="number" name="length" required>' +
                       '<label>Width: </label><input type="number" name="width" required>';
            } else if (operation === 'area_triangle') {
                html = '<label>Base: </label><input type="number" name="base" required>' +
                       '<label>Height: </label><input type="number" name="height" required>';
            } else if (operation === 'perimeter_triangle') {
                html = '<label>Side 1: </label><input type="number" name="side1" required>' +
                       '<label>Side 2: </label><input type="number" name="side2" required>' +
                       '<label>Side 3: </label><input type="number" name="side3" required>';
            } else if (operation === 'volume_sphere' || operation === 'surface_sphere') {
                html = '<label>Radius: </label><input type="number" name="radius" required>';
            } else if (operation === 'volume_cylinder' || operation === 'surface_cylinder') {
                html = '<label>Radius: </label><input type="number" name="radius" required>' +
                       '<label>Height: </label><input type="number" name="height" required>';
            }

            parametersDiv.innerHTML = html;
        });
    </script>
</body>
</html>
