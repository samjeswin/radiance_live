<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Icons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styles */
        /* .bottom-icon {} */

        .footer {
            background-color: #f8f9fa;
            /* padding: 20px 0;
                background-image: linear-gradient(180deg, black, transparent);
            position: relative; */
        }

        .footer .row {
            justify-content: center;
        }

        .footer a {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #0eb0cc;
            /* Set default color to blue */
            text-decoration: none;

            transition: transform 0.3s ease, color 0.3s ease, background-color 0.3s ease;
            /* Added color and background-color transition */
            border-radius: 50%;
            /* Make the icons circular */
            width: 50px;
            /* Set width for circular icons */
            height: 50px;
            /* Set height for circular icons */
        }

        .footer a.active {
            color: white;
            background-color: #0fb0cd;
            transform: translateY(-30px);

        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="container bottom-icon">
            <div class="row">
                <div class="col">
                    <a href="index" class="icon-link" onclick="setActiveIcon(0)">
                        <svg class="icon_color" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                        </svg>
                    </a>
                </div>
                <div class="col">
                    <a href="consumption" class="icon-link" onclick="setActiveIcon(1)">
                        <svg class="icon_color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                            <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                        </svg>
                    </a>
                </div>
                <div class="col">
                    <a href="support" class="icon-link" onclick="setActiveIcon(2)">
                        <svg class="icon_color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
                        </svg>
                    </a>
                </div>
                <div class="col">
                    <a href="profile" class="icon-link" onclick="setActiveIcon(3)">
                        <svg class="icon_color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to set the active icon index in sessionStorage
        function setActiveIcon(index) {
            sessionStorage.setItem('activeIcon', index);
        }

        // Function to add 'active' class to the icon corresponding to the stored active index
        document.addEventListener("DOMContentLoaded", function() {
            var activeIndex = sessionStorage.getItem('activeIcon');
            if (activeIndex !== null) {
                var icons = document.querySelectorAll('.icon-link');
                icons.forEach(icon => icon.classList.remove('active'));
                icons[activeIndex].classList.add('active');
            }
        });
    </script>
</body>

</html>