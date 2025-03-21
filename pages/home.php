<?php
$baseDir = __DIR__;
$pages = array_diff(scandir($baseDir), ['.', '..', 'home.php', '404.php']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman web 2</title>
    <style>
        :root {
            --primary: #2A5C8D;
            --secondary: #F5F7FA;
            --text: #333;
            --border: #e0e0e0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
            background-color: var(--secondary);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: var(--primary);
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border);
        }

        .pages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .page-card {
            padding: 1.5rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .page-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .page-card a {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .page-icon {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 1.75rem;
            }
            
            .pages-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <svg class="page-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Pemrograman web 2
        </h1>
        
        <div class="pages-grid">
            <?php foreach ($pages as $page): ?>
                <?php if(!is_dir($page)): ?>
                    <div class="page-card">
                        <a href="<?= basename($page, '.php') ?>">
                            <svg class="page-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <?= ucfirst(basename($page, '.php')) ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>