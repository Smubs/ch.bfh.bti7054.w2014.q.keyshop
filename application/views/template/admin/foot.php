            </div>
        </div>
        <footer>
            <div class="footer-copyright">
                <div class="container">Copyright &copy; 2015, Michael Räss & Tobias Schmoker</div>
            </div>
        </footer>
    </div>

    <?= $prescripts ?>
    <script type="text/javascript">
        var ks = $.parseJSON($.base64.decode('<?= $jsdata ?>'));
    </script>
    <?= $scripts ?>
</body>
</html>