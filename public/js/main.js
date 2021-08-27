'use strict';

{
  const destroy = document.querySelector('.delete');

  destroy.addEventListener('click',()=>{
    if(!confirm('Are you sure?')){
      return
    }
    destroy.parentNode.submit();
  });
}
