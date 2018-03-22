var http = require('http')
var ttn = require("ttn")
// Set credentials for TTN network
const appID = 'spotless'
const accessKey = 'ttn-account-v2.VUbE0HHN0NRxMbhvGu7vgtM7BS-Bg9rNyURJlN_3hEw'
// Set target domain or IP of SpotLess application
const targetIP = '136.144.183.59'

// Welcome message for console
console.log('-------------------------------------------------');
console.log("Start CatchTTN")
console.log("A Node.JS application to bridge TTN and SpotLess")
console.log("Input: JSONs in bytes\n Output: POST request to API")
console.log("Version: 1.2")
console.log('-------------------------------------------------\n');

// Start listening to TTN network for packages on certain account
ttn.data(appID, accessKey)
  .then(function (client) {
    client.on("uplink", function (devID, payload) {
      // Convert the buffer to a string and parse it to a JSON object
      let results = JSON.parse(payload.payload_raw.toString())
      // Parse the payload metadata (input) and add to JSON
      results['bucket_id'] = payload.dev_id.substr(16)

      // Log data to console for feedback
      console.log("Meting van bucket " + results.bucket_id);
      console.log('Sensor A: ' + results.SA)
      console.log('Sensor B: ' + results.SB)
      console.log('Latitude: ' + results.LAT)
      console.log('Longitude: ' + results.LNG)
      console.log()

      // Send data off to be handled by virtual server
      postData(results)
    })
  })
  .catch(function (error) {
    console.error("Error", error)
    process.exit(1)
  })

function postData(json_data) {
  // Set the options for the http request
  var options = {
      hostname: targetIP,  // Is set globally
      port: 80,  // Universal HTTP port
      path: '/api/measurement',  // Path to the running API
      method: 'POST',  //Required for Laravel API
      headers: {
          // The API expects raw JSON data
          'Content-Type': 'application/json',
        }
      };

  // Set up the http request
  var req = http.request(options, function(res) {
    res.setEncoding('utf8');  // Set encoding, utf8 is default
    res.on('data', function (body) {
      console.log('Body: ' + body);
    });
  });
  req.on('error', function(e) {
    console.log('problem with request: ' + e.message);
  });
  // Send the JSON data off to SpotLess
  req.write(JSON.stringify(json_data));
}
