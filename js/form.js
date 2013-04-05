$(document).ready(function()
{
  $('#bug_target_target').change(pneq.handlePluginNameInput);
  $('#custom_target_target').change(pneq.handlePluginNameInput);
});

pneq = 
{
  handlePluginNameInput: function()
  {
    if ($(this).val() == 'core')
    {
      $(this).parent('div').find('label').hide();
    }
    else
    {
      $(this).parent('div').find('label').show();
    }
  }
};