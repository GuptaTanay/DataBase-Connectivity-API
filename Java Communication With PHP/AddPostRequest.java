import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Scanner;
import java.net.*;

public class AddPostRequest {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String first_name, last_name;
        System.out.print(" Enter first name : ");
        first_name = sc.nextLine();
        System.out.print(" Enter last name : ");
        last_name = sc.nextLine();
		
        String url_string = "http://localhost/androidcheck/DBCONN/InsertionThroughPostFromJava.php";        //save your php file in htdocs of xampp, then only it can be accessed by localhost url
        String data_string = "f_name=" + URLEncoder.encode(first_name);			
        data_string += "&l_name=" + URLEncoder.encode(last_name); 			        //take care to match the l_name with $_GET["l_name"]
        //System.out.println(url_string); 	
		//for checking the url in GET reques types
        try {
            URL url = new URL(url_string);		//checks if the URL is right
            HttpURLConnection con = (HttpURLConnection) url.openConnection();		//opens the connection form the given url
           
			con.setRequestMethod("POST");					//sets the method by which we want to send the request .ie. GET,POST,REQUEST
			con.setDoOutput(true);
			OutputStreamWriter osw= new OutputStreamWriter(con.getOutputStream());
			osw.write(data_string);
			osw.flush();
			
			
            int responseCode = con.getResponseCode();		//checks for the responseCode.ie. Status

            if (responseCode == HttpURLConnection.HTTP_OK) {
                BufferedReader reader;
                reader = new BufferedReader(new InputStreamReader(con.getInputStream())); 		//gets the InputStream from the connection and passes it to reader
                String result = "";								
                while ((result = reader.readLine()) != null)		//reader reads the content on the web page and set it to result
				{
                    System.out.println(result);
                }
                reader.close();					//close the reader
            } else {
                System.out.println(" There are some errors ");
            }
        } catch (IOException ex) {
            System.out.println(ex);
        }
    }
}
