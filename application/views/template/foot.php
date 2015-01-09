</div>
</div>
<footer>
    <div class="footer-top-area">
        <div class="container">
		
			<div class="search-input" style="float: right">
				<select class="form-control" type="text">
					<option>Deutsch</option>
					<option>English</option>
				</select>
			</div>
		</div>
    </div>
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
