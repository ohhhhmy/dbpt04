<?php
  date_default_timezone_set('Asia/Seoul');

  $link = mysqli_connect('localhost', 'root', 'gees00409', 'dbpfinal');
  $renttime= mysqli_real_escape_string($link, $_POST['time']);
  $rentplace = mysqli_real_escape_string($link, $_POST['place']);

  if ($renttime == 0) {
      $renttime = date("H");
  }

  $query = "select rentalshops.rentalshop, sum(hourlyuse.usage) as s from hourlyuse join rentalshops on hourlyuse.rentplace = rentalshops.rentplace where rentalshops.gu='{$rentplace}' and hourlyuse.renttime='{$renttime}' group by hourlyuse.renttime, rentalshops.rentalshop order by s limit 300";
  $rows = mysqli_query($link, $query);
  $rowResult = '';
  while ($row = mysqli_fetch_assoc($rows)) {
      $rowResult .= '<tr>';
      $rowResult .= '<td>'.$row['rentalshop'].'</td>';
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
    <h3> 입력하신 <?= $renttime ?> 시간 대 <?= $rentplace ?> 에서 최소로 복잡한 대여소 정보입니다.  </h3>
    <table border=1>
      <tr>
          <th> 대여소명 </th>
          <th> 이용건수 </th>
      </tr>
      <?= $rowResult ?>
    </table>
    * 시간과 이용건수: 해당 시간부터 1시간 내 대여 건수의 합입니다.
  </body>

</html>
