<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>WU-P Campus Map</title>
    <style>

        body {
            padding: 12px;
            background-image: url("images/bg.png");
            background-attachment:fixed;
            background-repeat: repeat-y;
            background-size: cover;
            background-color: #cccccc;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }
    
        h1 {
            text-align: center; /* Center the heading */
            margin-bottom: 20px; /* Add some space below the heading */
        }
    
        .announcements {
            margin-bottom: 10px; /* Add space below announcements */
        }

        
        .navbar-custom {
            background-color:  #006A3A;
        }
        /* change the brand and text color */
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
        color: #ffffff;
        }

        /* change the link color */
        .navbar-custom .navbar-nav .nav-link {
        color: #fff;
        }
        .navbar-nav .dropdown:hover .dropdown-menu {
        display: block; /* Show dropdown on hover */
        color:#006a3a6a;
        }

       /* The dropdown container */
        /* Change the link color */
        .navbar-custom .navbar-nav .nav-link {
            color: #0b0b0b;
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: #ffffff53;;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            padding: 10px; /* Add padding */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgb(0, 0, 0); /* Change icon color to white */
            border-radius: 50%; /* Make the icons circular */
            width: 40px; /* Increase width */
            height: 40px; /* Increase height */
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Darker background on hover */
        }

        .floating-container {
            position: fixed; /* Use fixed positioning to keep it in view */
            bottom: 20px; /* Distance from the bottom of the viewport */
            right: 20px; /* Distance from the right of the viewport */
            z-index: 1000; /* Ensure it is above other elements */
        }

        .floating-button {
            background-color: #006A3A; /* Button color */
            color: white; /* Text color */
            border-radius: 50%; /* Make it circular */
            width: 60px; /* Width of the button */
            height: 60px; /* Height of the button */
            display: flex; /* Use flexbox to center the icon */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            font-size: 24px; /* Icon size */
            cursor: pointer; /* Change cursor to pointer */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        .floating-button:hover {
            background-color:#032616; /* Darker color on hover */
        }

        .element-container {
            display: none; /* Initially hide the elements */
            position: absolute; /* Position them absolutely */
            bottom: 70px; /* Position above the button */
            right: 0; /* Align to the right */
            z-index: 1000; /* Ensure it is above other elements */
            opacity: 0; /* Start with opacity 0 for transition */
            transition: opacity 0.3s ease, visibility 0.3s ease; /* Smooth transition */
            visibility: hidden; /* Hide the container */
        }

        .element-container.active {
            display: block; /* Show the elements when active */
            opacity: 1; /* Fade in */
            visibility: visible; /* Make it visible */
        }

        .float-element {
            background-color: white; /* Background color for icons */
            box-shadow: #0b0b0b;
            border-radius: 50%; /* Make them circular */
            width: 40px; /* Width of the icon container */
            height: 40px; /* Height of the icon container */
            display: flex; /* Use flexbox to center the icon */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            margin: 5px 0; /* Space between icons */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        .float-element:hover {
            background-color: #f0f0f0; /* Change background on hover */
        }

        .collapsible-button {
    background-color: #007BFF;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: left;
}

.accordion-container {
    display: none; /* Hide accordion by default */
    padding: 0 15px;
}

.accordion-item {
    margin: 5px 0;
}

.accordion-button {
    background-color: #f1f1f1;
    border: none;
    text-align: left;
    outline: none;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    transition: background-color 0.3s;
}

.accordion-button:hover {
    background-color: #ddd;
}

.accordion-content {
    display: none; /* Hide content by default */
    padding: 10px;
    border: 1px solid #ccc;
}
    </style>
</head>

<body>
    @include('includes.nav')
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const floatingButton = document.querySelector('.floating-button');
            const elementContainer = document.querySelector('.element-container');

            // Toggle visibility on button click
            floatingButton.addEventListener('click', function() {
                elementContainer.classList.toggle('active');
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
    const collapsibleButton = document.querySelector('.collapsible-button');
    const accordionContainer = document.querySelector('.accordion-container');

    collapsibleButton.addEventListener('click', function() {
        accordionContainer.style.display = accordionContainer.style.display === 'block' ? 'none' : 'block';
    });

    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const isActive = content.style.display === 'block';

            // Close all accordion items
            document.querySelectorAll('.accordion-content').forEach(item => {
                item.style.display = 'none';
            });

            // Toggle the clicked item
            content.style.display = isActive ? 'none' : 'block';
        });
    });
});
    </script>
</body>

</html>
