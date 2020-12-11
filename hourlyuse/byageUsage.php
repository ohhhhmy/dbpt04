<?php
  $link = mysqli_connect('localhost', 'root', 'gees00409', 'dbpfinal');
  $age= mysqli_real_escape_string($link, $_POST['age']);
  $rentplace = mysqli_real_escape_string($link, $_POST['place']);

  $query = "select sum(hourlyuse.usage) as s, hourlyuse.renttime, rentalshops.rentalshop from hourlyuse join rentalshops on hourlyuse.rentplace = rentalshops.rentplace where hourlyuse.agecode='{$age}' and rentalshops.gu='{$rentplace}' group by hourlyuse.renttime, rentalshops.rentalshop order by s, rentalshops.gu, hourlyuse.renttime limit 300;";
  $rows = mysqli_query($link, $query);
  $rowResult = '';
  while ($row = mysqli_fetch_array($rows)) {
      $rowResult .= '<tr>';
      $rowResult .= '<td>'.$row['rentalshop'].'</td>';
      $rowResult .= '<td>'.$row['renttime'].'</td>';
      $rowResult .= '<td>'.$row['s'].'</td>';
      $rowResult .= '</tr>';
  }

  if ($rows == false) {
      echo '조회 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      echo "<a href='main.php'> 돌아가기 </a>";
      error_log(mysqli_error($link));
  }
?>
<html>
  <head>
      <meta charset="utf-8">
      <title> 시간대 별 이용 복잡도 </title>
  </head>
  <body>
    <h3> 입력하신 <?= $age ?>의 <?= $rentplace ?>의 대여소 정보입니다. </h3>
    <table border=1>
      <tr>
          <th> 대여소명 </th>
          <th> 시간 </th>
          <th> 최소 이용건수 </th>
      </tr>
      <?= $rowResult ?>
    </table>
    * 시간과 이용건수: 해당 시간부터 1시간 내 대여 건수의 합입니다.
  </body>

</html>
