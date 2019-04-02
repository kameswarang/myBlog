            </div>
        <?php if(!isset($_SESSION['currUser'])): ?>
        <a id="login" href="<?= BASE_URL; ?>/admin/login.php">Login as Admin</a>
        <?php endif; ?>
        </div>
    </body>
</html>