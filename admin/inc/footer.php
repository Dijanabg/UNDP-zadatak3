<footer class="footer mt-auto pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="#" class="font-weight-bold" target="_blank">Dijana</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="../view/home.php" class="nav-link text-muted" target="_blank">Home</a>
              </li>
              <li class="nav-item">
                <a href="../view/category.php" class="nav-link text-muted" target="_blank">Kategorije</a>
              </li>
              <li class="nav-item">
                <a href="../view/contact.php" class="nav-link text-muted" target="_blank">Kontakt</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
</footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="scripts/js/perfect-scrollbar.min.js"></script>
  <script src="scripts/js/smooth-scrollbar.min.js"></script>
<!-- Alertify JS za iskacuce poruke -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    <?php if (isset($_SESSION['message'])) {
    ?>
        alertify.set('notifier', 'position', 'top-center');
        alertify.success("<?= $_SESSION['message'] ?>");
    <?php
        unset($_SESSION['message']);
    }
    ?>
    </script>
</body>

</html>