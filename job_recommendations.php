<?php
session_start();

$jobCategory = $_GET['category'] ?? null;

if (!$jobCategory) {
    echo "No job category provided.";
    exit();
}

$allJobs = [
    'Software Engineering' => [
        [
            'title' => 'Full Stack Developer',
            'location' => 'Remote',
            'description' => 'Develop and maintain modern web applications using Laravel and Vue.js.'
        ],
        [
            'title' => 'Backend Engineer',
            'location' => 'Nairobi, Kenya',
            'description' => 'Build scalable APIs and database services using Node.js and PostgreSQL.'
        ],
        [
            'title' => 'Frontend Developer',
            'location' => 'Remote',
            'description' => 'Create dynamic interfaces using React.js, HTML5, and Tailwind CSS.'
        ],
        [
            'title' => 'DevOps Engineer',
            'location' => 'Mombasa, Kenya',
            'description' => 'Automate deployment pipelines using Docker, Jenkins, and AWS.'
        ],
        [
            'title' => 'QA Automation Engineer',
            'location' => 'Nakuru, Kenya',
            'description' => 'Write and maintain automated test scripts using Selenium and Python.'
        ]
    ],
    'Product Management' => [
        [
            'title' => 'Product Manager',
            'location' => 'Nairobi, Kenya',
            'description' => 'Define product vision and roadmap, work closely with engineering and design teams.'
        ],
        [
            'title' => 'Associate Product Manager',
            'location' => 'Remote',
            'description' => 'Assist in product research, user feedback, and sprint planning.'
        ],
        [
            'title' => 'Technical Product Manager',
            'location' => 'Eldoret, Kenya',
            'description' => 'Translate technical requirements into product features and releases.'
        ],
        [
            'title' => 'Product Owner',
            'location' => 'Kisumu, Kenya',
            'description' => 'Prioritize backlog, manage sprint goals, and align product with business goals.'
        ],
        [
            'title' => 'Growth Product Manager',
            'location' => 'Remote',
            'description' => 'Experiment and iterate on features to drive product growth and user engagement.'
        ]
    ],
    'Design' => [
        [
            'title' => 'UI/UX Designer',
            'location' => 'Nairobi, Kenya',
            'description' => 'Design modern, user-friendly interfaces with Figma and Adobe XD.'
        ],
        [
            'title' => 'Visual Designer',
            'location' => 'Remote',
            'description' => 'Create branding, logos, and visual content for web and print.'
        ],
        [
            'title' => 'Product Designer',
            'location' => 'Kisumu, Kenya',
            'description' => 'Collaborate with product teams to design intuitive product flows.'
        ],
        [
            'title' => 'Motion Designer',
            'location' => 'Remote',
            'description' => 'Create animations and motion graphics for product demos and ads.'
        ],
        [
            'title' => 'Graphic Designer',
            'location' => 'Mombasa, Kenya',
            'description' => 'Design marketing materials and campaign assets for social media.'
        ]
    ],
    'Marketing' => [
        [
            'title' => 'Digital Marketing Specialist',
            'location' => 'Nairobi, Kenya',
            'description' => 'Manage social media campaigns, SEO, and Google Ads.'
        ],
        [
            'title' => 'Content Marketer',
            'location' => 'Remote',
            'description' => 'Create engaging blog posts, newsletters, and landing pages.'
        ],
        [
            'title' => 'SEO Specialist',
            'location' => 'Nakuru, Kenya',
            'description' => 'Improve organic visibility and optimize web content for search engines.'
        ],
        [
            'title' => 'Marketing Manager',
            'location' => 'Remote',
            'description' => 'Develop and lead multi-channel marketing strategies and analytics.'
        ],
        [
            'title' => 'Social Media Manager',
            'location' => 'Eldoret, Kenya',
            'description' => 'Plan and execute content across Instagram, Facebook, and TikTok.'
        ]
    ]
];

$recommendedJobs = $allJobs[$jobCategory] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recommended Jobs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }
        .recommendations {
            max-width: 800px;
            margin: auto;
        }
        .job-card {
            background: #fff;
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .job-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }
        .job-location {
            font-size: 0.9rem;
            color: #666;
        }
        .job-description {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="recommendations">
        <h2>Recommended Jobs in <?php echo htmlspecialchars($jobCategory); ?></h2>

        <?php if (!empty($recommendedJobs)): ?>
            <?php foreach ($recommendedJobs as $job): ?>
                <div class="job-card">
                    <div class="job-title"><?php echo htmlspecialchars($job['title']); ?></div>
                    <div class="job-location">Location: <?php echo htmlspecialchars($job['location']); ?></div>
                    <div class="job-description"><?php echo nl2br(htmlspecialchars($job['description'])); ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job recommendations found for this category.</p>
        <?php endif; ?>
    </div>
</body>
</html>
