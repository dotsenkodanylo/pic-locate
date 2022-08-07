import axios from 'axios';
import AsyncStorage from "@react-native-async-storage/async-storage";

const instance = axios.create({
   baseURL: 'http://127.0.0.1:8000/api',
   headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'Content-type': 'application/json',
      'Accept': 'application/json'
   },
   withCredentials: true,
});

instance.interceptors.request.use(async (config) => {
      const token = await AsyncStorage.getItem('token');
      if (token) {
         config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
   },
   (error) => {
      return Promise.reject(error);
   },
);


/*
async function login() {
   try {
      const response = await http.post('/api/login-mobile', {
         email: 'dotsenkodanylo@gmail.com',
         password: 'asdfASDF123!',
         device_name: 'Bitch Iphone'
      });
      console.log('Logged in: ', response.data);
   } catch (error) {
      console.log('Error logging in: ', error);
   }
}

async function logout() {
   try {
      const response = await http.post('/api/logout');
      console.log('Logged out: ', response.headers);
   } catch (error) {
      console.log('Error logging in: ', error);
   }
}

async function getUser() {
   try {
      const response = await http.get('/api/user');
      console.log('User successful: ', response.data);
   } catch (error) {
      console.log('Error getting user, something wrong with cookeis: ', error);
   }
}
*/

export default instance;
