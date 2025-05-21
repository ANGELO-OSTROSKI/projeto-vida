<?php
include 'inc/db.php';
//-- consulta dados do banco
$sql = 'SELECT * FROM tbl_personalities ORDER BY no ASC';
$result = $db->query($sql);
$x = array();
$no = 0;
while ($row = $result->fetch_object()) {
  if ($no != $row->no) {
    $no = $row->no;
    $x[$no] = array();
  }
  $x[$no][] = $row;
}
$data = array();
foreach ($x as $dt) {
  foreach ($dt as $d) {
    $data[] = $d;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Teste de Personalidade DISC</title>
  <meta http-equiv="expires" content="<?php echo date('r'); ?>" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="cache-control" content="no-cache" />
  <link rel='stylesheet' href='css/disc.css?<?php echo md5(date('r')); ?>' />
</head>

<body>
  <header>
    <h1> Teste de Personalidade </h1>

      <nav>
            <ul>
                <li> <a href="../index.php?action=perfil"><img src="../IMG\QUIZ.png" alt="" height="58" width="58"></a></li>
                <li> <a href="../index.php?action=perfil"><img src="../IMG\stickman.png" alt="" height="58" width="58"></a></li>
                <li> <a href="../index.php?action=pernil"><img src="../IMG\user.png" alt="" height="58" width="58"></a></li>
                <li> <a href="../index.php?action=logout"><img src="../IMG\saida.png" alt="" height="58" width="58"></a></li>
            </ul>    
        </nav>
  </header>
  <div id='container'>
    <div class='info-box'>
      <b>INSTRUÇÕES</b>: Cada número abaixo contém 4 (quatro) frases. Sua tarefa é: <br />
      <ol>
        <li>Marque com ✓ (coluna <b>Mais</b>) a frase que MAIS representa você</li>
        <li>Marque com ✗ (coluna <b>Menos</b>) a frase que MENOS representa você</li>
      </ol>
      <br />
      <b>ATENÇÃO</b>: Em cada número deve haver apenas <u>uma marcação</u> na coluna Mais (✓) e <u>uma</u> na coluna Menos (✗).
    </div>
    <form method='post' action='result.php'>
      <table>
        <thead>
          <tr>
            <?php for ($i = 0; $i < 3; ++$i): ?>
              <th>Nº</th>
              <th>Descrição</th>
              <th>Mais (✓)</th>
              <th>Menos (✗)</th>
            <?php endfor; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i < 8; $i++) {
            echo "<tr" . ($i % 2 == 0 ? " class='dark'" : "") . ">";
            for ($j = 0; $j < 4; ++$j) {
              for ($n = 0; $n < 3; $n++) {
                if ($j > 0 && $n == 0) {
                  echo "<tr" . ($i % 2 == 0 ? " class='dark'" : "") . ">";
                } elseif ($j == 0) {
                  echo "<th rowspan='4'"
                    . ($j == 0 ? " class='first'" : "") . ">"
                    . ($i + $n * 8 + 1)
                    . "</th>";
                }
                $no = $n * 8 + $i * 4 + $j + (24 * $n);
                echo "<td" . ($j == 0 ? " class='first'" : "") . ">
                    {$data[$no]->term}
                  </td>
                  <td" . ($j == 0 ? " class='first'" : "") . ">
                    <input type='radio' 
                           name='m[" . ($i + $n * 8) . "]' 
                           value='{$data[$no]->most}' 
                           aria-label='Mais' 
                           required /> ✓
                  </td>
                  <td" . ($j == 0 ? " class='first'" : "") . ">
                    <input type='radio' 
                           name='l[" . ($i + $n * 8) . "]' 
                           value='{$data[$no]->least}' 
                           aria-label='Menos' 
                           required /> ✗
                  </td>";
              }
              echo "</tr>";
            }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan='3'>
              <input type='submit' value='Processar' class='btn' />
            </th>
          </tr>
        </tfoot>
      </table>
    </form>
  </div>
  <footer>
    copyright &copy; 2016<?php echo (date('Y') > 2016 ? '-' . date('Y') : ''); ?> por
    <a href='mailto:cahyadsn@gmail.com'>cahya dsn</a>
  </footer>
</body>

</html>