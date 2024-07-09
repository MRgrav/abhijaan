
<div class="container bg-gray h-full">
    <div class="flex align-center justify-center h-full">
        <div class="card rounded-lg shadow w-50 border border-blue">
                <h1 class="card-title text-center text-blue">Connection Page</h1>
                <?php if ($pdo) { ?>
                <p class="my-6 text-center">
                    Your project is connected to the <b><?= DB ?></b> database.
                </p>
                <?php } else { ?>
                <p class="my-6 text-center">
                    Your project is not connected to any database. Please check config file.
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

