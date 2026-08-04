<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <header class="text-center mb-4">
            <h1 class="display-4">My Portfolio</h1>
        </header>

        <ul class="nav nav-tabs mb-4" id="portfolioTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">About Me</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab" aria-controls="experience" aria-selected="false">Experience</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="work-tab" data-bs-toggle="tab" data-bs-target="#work" type="button" role="tab" aria-controls="work" aria-selected="false">My Works</button>
            </li>
        </ul>

        <div class="tab-content" id="portfolioContent">
            <!-- About Me Section -->
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <h2>About Me</h2>
                <p>Hello! I am a dedicated professional passionate about technology and creativity. Welcome to my portfolio website where you can explore my journey and works.</p>
            </div>

            <!-- Experience Section -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <h2>Experience</h2>
                <form id="experienceForm" class="mb-4" method="POST" action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="description" placeholder="Description" required>
                    </div>
                    <button type="submit" name="createExperience" class="btn btn-primary">Add Experience</button>
                </form>
                <div id="experienceList">
                    <?php
                    session_start();
                    if (!isset($_SESSION['experienceItems'])) {
                        $_SESSION['experienceItems'] = [];
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['createExperience'])) {
                            $title = htmlspecialchars($_POST['title']);
                            $description = htmlspecialchars($_POST['description']);
                            $_SESSION['experienceItems'][] = [
                                'title' => $title,
                                'description' => $description
                            ];
                        }

                        if (isset($_POST['updateExperience'])) {
                            $index = intval($_POST['index']);
                            $_SESSION['experienceItems'][$index]['title'] = htmlspecialchars($_POST['title']);
                            $_SESSION['experienceItems'][$index]['description'] = htmlspecialchars($_POST['description']);
                        }
                    }

                    if (isset($_GET['deleteExperience'])) {
                        $index = intval($_GET['deleteExperience']);
                        array_splice($_SESSION['experienceItems'], $index, 1);
                    }

                    foreach ($_SESSION['experienceItems'] as $index => $item) {
                        echo "<div class='card mb-3'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$item['title']}</h5>
                                    <p class='card-text'>{$item['description']}</p>
                                    <a href='?editExperience={$index}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='?deleteExperience={$index}' class='btn btn-danger btn-sm'>Delete</a>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>

            <!-- My Works Section -->
            <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
                <h2>My Works</h2>
                <form id="workForm" class="mb-4" method="POST" action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="description" placeholder="Description" required>
                    </div>
                    <button type="submit" name="createWork" class="btn btn-primary">Add Work</button>
                </form>
                <div id="workList">
                    <?php
                    if (!isset($_SESSION['workItems'])) {
                        $_SESSION['workItems'] = [];
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['createWork'])) {
                            $title = htmlspecialchars($_POST['title']);
                            $description = htmlspecialchars($_POST['description']);
                            $_SESSION['workItems'][] = [
                                'title' => $title,
                                'description' => $description
                            ];
                        }

                        if (isset($_POST['updateWork'])) {
                            $index = intval($_POST['index']);
                            $_SESSION['workItems'][$index]['title'] = htmlspecialchars($_POST['title']);
                            $_SESSION['workItems'][$index]['description'] = htmlspecialchars($_POST['description']);
                        }
                    }

                    if (isset($_GET['deleteWork'])) {
                        $index = intval($_GET['deleteWork']);
                        array_splice($_SESSION['workItems'], $index, 1);
                    }

                    foreach ($_SESSION['workItems'] as $index => $item) {
                        echo "<div class='card mb-3'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$item['title']}</h5>
                                    <p class='card-text'>{$item['description']}</p>
                                    <a href='?editWork={$index}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='?deleteWork={$index}' class='btn btn-danger btn-sm'>Delete</a>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Print CV Section -->
            <div class="text-center mt-4">
                <button class="btn btn-success" onclick="printCV()">Print CV</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function printCV() {
            const aboutMe = document.querySelector('#about').innerHTML;
            const experience = document.querySelector('#experienceList').innerHTML;
            const works = document.querySelector('#workList').innerHTML;

            const cvContent = `
                <div>
                    <h1>My CV</h1>
                    <section>
                        <h2>About Me</h2>
                        ${aboutMe}
                    </section>
                    <section>
                        <h2>Experience</h2>
                        ${experience}
                    </section>
                    <section>
                        <h2>My Works</h2>
                        ${works}
                    </section>
                </div>
            `;

            const newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write('<html><head><title>Print CV</title></head><body>');
            newWindow.document.write(cvContent);
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.print();
        }
    </script>
</body>
</html>
