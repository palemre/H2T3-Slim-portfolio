<?php

// Home
$app
    ->get(
        '/',
        function($request, $response)
        {
            // Fetch last two works
            $query = $this->db->query('SELECT * FROM works ORDER BY id DESC LIMIT 2');
            $lastWorks = $query->fetchAll();

            $viewData = [];
            $viewData['lastTitle'] = $lastWorks[0]->title;
            $viewData['lastDescription'] = $lastWorks[0]->description;
            $viewData['lastImage'] = $lastWorks[0]->image;
            $viewData['lastImageAlt'] = $lastWorks[0]->image_alt;
            $viewData['lastGit'] = $lastWorks[0]->github;

            $viewData['beforeLastTitle'] = $lastWorks[1]->title;
            $viewData['beforeLastDescription'] = $lastWorks[1]->description;
            $viewData['beforeLastImage'] = $lastWorks[1]->image;
            $viewData['beforeLastImageAlt'] = $lastWorks[1]->image_alt;
            $viewData['beforeLastGit'] = $lastWorks[1]->github;

            return $this->view->render($response, 'pages/home.twig', $viewData);
        }
    )
    ->setName('home')
;

// Works
$app
    ->get(
        '/works',
        function($request, $response)
        {
            // Fetch works
            $query = $this->db->query('SELECT * FROM works');
            $works = $query->fetchAll();

            $viewData = [];
            $viewData['works'] = $works;

            return $this->view->render($response, 'pages/works.twig', $viewData);
        }
    )
    ->setName('works')
;