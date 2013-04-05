$(document).ready(function()
{
  $('#bug_target_target').change(function(){ if ($(this).val() == 'core'){ $('#bug_target label').hide(); }else{ $('#bug_target label').show(); } });
});