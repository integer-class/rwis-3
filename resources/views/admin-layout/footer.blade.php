<footer id="myFooter" class="footer-center p-3 text-base-content bg-white rounded-b-lg shadow-xl mb-5 mx-5">
    <aside>
        <p>Copyright © 2024 - All right reserved by RWIS 11</p>
    </aside>
</footer>

<script>
  window.onload = function() {
      var path = window.location.pathname;
      if (path === '/issue/report') {
          document.getElementById('myFooter').style.display = 'none';
      }
  }
</script>