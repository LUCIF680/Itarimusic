var privious_amount;
for(let i = 0;i<3;i++){
  if (privious_amount === undefined){
  // onclick of button button style should change
      let amount = document.getElementsByClassName('onetime')[i];
      amount.onclick = function() {
      amount.classList.add('buttonchange');
      privious_amount = amount;
        };
  }else{
    alert();
    privious_amount.classList.remove('buttonchange');
    let amount = document.getElementsByClassName('onetime')[i];
    amount.onclick = function() {
    amount.classList.add('buttonchange');
    privious_amount = amount;
    };
  }
}
