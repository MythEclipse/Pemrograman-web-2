<?php
$baseDir = __DIR__;

// Ambil semua file PHP di direktori ini (kecuali tertentu)
$pages = array_filter(scandir($baseDir), function ($item) use ($baseDir) {
    return is_file($baseDir . '/' . $item)
        && pathinfo($item, PATHINFO_EXTENSION) === 'php'
        && !in_array($item, ['home.php', '404.php']);
});

// Ambil folder di direktori praktikum
$praktikumDir = $baseDir . '/../praktikum';
$praktikum = is_dir($praktikumDir) ? array_diff(scandir($praktikumDir), ['.', '..']) : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Web 2</title>
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

        h2 {
            color: var(--primary);
            margin-top: 2rem;
            font-size: 1.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 0.5rem;
        }

        .pages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .page-card {
            padding: 1.5rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .page-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .page-icon {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 2px solid var(--border);
            color: var(--text);
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

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .module-card {
            background: white;
            border: 2px solid var(--border);
            border-radius: 8px;
            padding: 1.5rem;
            transition: all 0.2s ease;
        }

        .module-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .module-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border);
        }

        .module-icon {
            width: 24px;
            height: 24px;
            stroke: var(--primary);
        }

        .module-card h3 {
            margin: 0;
            color: var(--primary);
            font-size: 1.25rem;
        }

        .praktikum-grid {
            display: grid;
            gap: 0.75rem;
        }

        .praktikum-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.8rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            color: var(--text);
            transition: all 0.2s ease;
            background-color: var(--secondary);
            border: 1px solid var(--border);
        }

        .praktikum-item:hover {
            background-color: #e3f2fd;
            border-color: var(--primary);
            transform: translateX(5px);
        }

        .praktikum-item .page-icon {
            width: 18px;
            height: 18px;
            stroke-width: 1.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>
            <svg class="page-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Pemrograman Web 2
        </h1>

        <!-- Teori -->
        <h2>Teori</h2>
        <div class="pages-grid">
            <?php foreach ($pages as $page): ?>
                <a class="page-card" href="<?= basename($page, '.php') ?>">
                    <svg class="page-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <?= ucfirst(basename($page, '.php')) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Praktikum -->
        <h2>Praktikum</h2>
        <div class="modules-grid">
            <?php foreach ($praktikum as $modul): ?>
                <?php if (is_dir($praktikumDir . '/' . $modul)): ?>
                    <div class="module-card">
                        <div class="module-header">
                            <svg class="module-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                            </svg>
                            <h3><?= ucfirst($modul) ?></h3>
                        </div>
                        <div class="praktikum-grid">
                            <?php
                            $modulFiles = array_diff(scandir($praktikumDir . '/' . $modul), ['.', '..']);
                            foreach ($modulFiles as $file):
                                if (pathinfo($file, PATHINFO_EXTENSION) === 'php'):
                            ?>
                                    <a href="/praktikum/<?= $modul ?>/<?= $file ?>" class="praktikum-item">
                                        <svg class="page-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                        </svg>
                                        <?= ucfirst(basename($file, '.php')) ?>
                                    </a>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        Dibuat oleh Asep Haryana Saputra
    </footer>
</body>

</html>
