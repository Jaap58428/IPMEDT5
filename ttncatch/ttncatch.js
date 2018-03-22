var http = require('http')
var ttn = require("ttn")
var fs = require('fs');
const appID = 'spotless'
const accessKey = 'ttn-account-v2.VUbE0HHN0NRxMbhvGu7vgtM7BS-Bg9rNyURJlN_3hEw'

// Welcome message for console
console.log('-------------------------------------------------');
console.log("Start CatchTTN")
console.log("A Node.JS application to convert TTN data to JSON")
console.log("Version: 1.0.0")
console.log('-------------------------------------------------\n');


// 136.144.183.59/groep_g/public/api/measurement

ttn.data(appID, accessKey)
  .then(function (client) {
    client.on("uplink", function (devID, payload) {
      // Convert the buffer to a string and parse it to a JSON object
      let results = JSON.parse(payload.payload_raw.toString())
      // Parse the metadata to a bucket id value
      results['bucket_id'] = payload.dev_id.substr(16)

      // Log data to console for feedback
      console.log("Meting van bucket " + results.bucket_id);
      console.log('Sensor A: ' + results.SA)
      console.log('Sensor B: ' + results.SB)
      console.log('Latitude: ' + results.LAT)
      console.log('Longitude: ' + results.LNG)
      console.log()
      postData(results)
    })
  })
  .catch(function (error) {
    console.error("Error", error)
    process.exit(1)
  })

function postData(json_data) {
  var options = {
      hostname: '136.144.183.59',
      port: 80,
      path: '/groep_g/public/api/measurement',
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
        }
      };
  var req = http.request(options, function(res) {
    console.log('Status: ' + res.statusCode);
    console.log('Headers: ' + JSON.stringify(res.headers));
    res.setEncoding('utf8');
    res.on('data', function (body) {
      console.log('Body: ' + body);
      // fs.writeFile("test.txt", body, function(err) {
      // if(err) {
      //   return console.log(err);
      // }
      //   console.log("The file was saved!");
      // });
    });
  });
  req.on('error', function(e) {
    console.log('problem with request: ' + e.message);
  });
  // write data to request body
  // req.write('{"string": result}');  ///RESULT HERE IS A JSON

  // result = '{ "hello": "json" }';
  req.write(JSON.stringify(json_data));


}
