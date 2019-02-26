
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
</head>
<body>
  <form action="filter.php" method="get">
    <p style="display: inline-flex;">
      <label>
      	<span style="font-weight: bolder; color: black; font-size: larger; padding-left: 10px">Filter RAM: </span>
        <input name="ram" type="radio" value="1" />
        <span style="font-weight: bolder">1 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="ram" type="radio" value="2" />
        <span style="font-weight: bolder">2 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="ram" type="radio" value="3" />
        <span style="font-weight: bolder">3 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="ram" type="radio" value="4" />
        <span style="font-weight: bolder">4 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input class="btn" name="ram" type="radio" value="6" />
        <span style="font-weight: bolder">6 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="ram" type="radio" value="8" />
        <span style="font-weight: bolder">8 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <button class="btn" name="filterram" type="submit">Filter Ram</button>
      </label>
    </p>
  </form>
  <form action="filter.php" method="get">
    <p style="display: inline-flex;">
      <label>
      	<span style="font-weight: bolder; color: black; font-size: larger; padding-left: 10px">Filter ROM: </span>
        <input name="rom" type="radio" value="16" />
        <span style="font-weight: bolder">16 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="rom" type="radio" value="32" />
        <span style="font-weight: bolder">32 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="rom" type="radio" value="64" />
        <span style="font-weight: bolder">64 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="rom" type="radio" value="128" />
        <span style="font-weight: bolder">128 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <input name="rom" type="radio" value="256" />
        <span style="font-weight: bolder">256 GB</span>
      </label>
    </p>
    <p style="display: inline-flex;">
      <label>
        <button class="btn" name="filterrom" type="submit">Filter ROM</button>
      </label>
    </p>
  </form>

</body>
</html>