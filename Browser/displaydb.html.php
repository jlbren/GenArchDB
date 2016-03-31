
</style>
</head>
<body>

    <p><a href="?addGene">Add a gene</a></p>
    <p>Here are all the genes in the database:</p>
   
    <table >
    <?php foreach ($result as $gname): ?>
      <tr>
      <td> <?php echo $gname['GeneName']; ?> </td>
       <td style= "width:150px"> <?php echo $gname['ENSID']; ?> </td>  
         <td>  
         <form action="?deleteGene" method="post">
          <input type="hidden" name="id" value="<?php echo $gname['GeneName']; ?>">
         <input type="submit" value="delete">
        </form>
      </td>
      </tr>
    <?php endforeach; ?>
    </table>
   
  </body>
</html>
