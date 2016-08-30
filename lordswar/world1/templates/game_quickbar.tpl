
{php}
$getUser = $db->query_("SELECT userid FROM villages WHERE id = :village", array('village' => $_GET['village']));
  while ($fetch = $db->fetch_assoc($getUser)) {
          $u = $fetch['userid'];
  }
$getQuickbar = $db->query_("SELECT id, name, img, href, target FROM quickbar WHERE uid = :u", array('u' => $u));
if ($getQuickbar->rowCount() > 0) {
{/php}
<br />
<table id="quickbar" class="menu nowrap" align="center">
  <tr>
      {php}
      $count = 0;
      require("include/config.php");
      {/php}
    {foreach from=$quickbar item=quick}
      {if substr($quick.href, 0, 8) == 'game.php'}
      <td><a href="{$quick.href}&village={$quick.vid}" {if $quick.target == 1} target="_blank"{/if}><img src="{$quick.img}" alt="" />{$quick.name}</a></td>
      {else}
      <td><a href="{$quick.href}" {if $quick.target == 1} target="_blank"{/if}><img src="{$quick.img}" alt="" />{$quick.name}</a></td>
      {/if}
      {php}
      $count = $count + 1;
      
      
      if (($count % $config['quickbar']) == 0) {
      echo "</tr>";
      echo "<tr>";
      
      }
      {/php}
   {/foreach}
  </tr>
</table>
{php}
}
{/php}
