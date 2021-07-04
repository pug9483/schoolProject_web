   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.nickname.value)
      {
          alert("비밀번호를 입력하세요!");    
          document.member_form.nickname.focus();
          return;
      }
      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.nickname.value = "";
      document.member_form.id.focus();
      return;
   }
