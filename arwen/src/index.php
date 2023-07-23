<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Regular</title>
   <link rel="stylesheet" href="pico.min.css" />
</head>

<body>
   <article style="margin-top: 8rem;">
      <div class="container" style="width: 20rem; text-align: center;">
         <label style="padding-bottom: .5rem">Valid Input: </label>
         <input id="input" type="text" autocomplete="off" placeholder="Valid" />
         <button onclick="send_request();">Submit</button>
      </div>
   </article>

   <script>
      function send_request() {
         let val = document.getElementById("input").value;
         // ^t........N!?
         fetch(`/flag.php?flag=${val}`)
            .then(res => res.text())
            .then(res => {
               const res_json = JSON.parse(res);
               if (res_json.status === "OK") {
                  alert("OK")
               } else {
                  alert("Failed")
               }
            })
         return false;
      }
   </script>
</body>

</html>