<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>404 Page</title>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"> -->
</head>

<body>
    <div class="text">
        <div>ERROR</div>
        <h1>404</h1>
        <hr>
        <p>
            The page you're hunting for is on vacation, exploring the depths of cyberspace, or perhaps <br>
            sipping digital coffee. We'll keep searching, but until then, why don't you enjoy this tech-related
            joke?<br>
            Why did the web page go to therapy? Too many issues! 😄 Stay tuned!
        </p>
    </div>

    <div class="astronaut">
        <img src="images/astron.png" alt="" class="src">
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        var body = document.body;
        setInterval(createStar, 100);

        function createStar() {
            var right = Math.random() * 500;
            var top = Math.random() * screen.height;
            var star = document.createElement("div");
            star.classList.add("star")
            body.appendChild(star);
            setInterval(runStar, 10);
            star.style.top = top + "px";

            function runStar() {
                if (right >= screen.width) {
                    star.remove();
                }
                right += 3;
                star.style.right = right + "px";
            }
        }
    })
</script>

</html>