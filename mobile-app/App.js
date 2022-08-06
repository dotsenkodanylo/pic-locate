import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import AuthSplashScreen from './src/screens/AuthSplashScreen';
import HomeScreen from './src/screens/HomeScreen';
import { Context as AuthContext, Provider as AuthProvider } from './src/contexts/AuthContext';
import React, { useContext, useEffect } from 'react';
import LoginScreen from './src/screens/LoginScreen';
import SignupScreen from './src/screens/SignupScreen';

const Stack = createNativeStackNavigator();

const AuthNavStack = () => {
   return (
      <Stack.Navigator >
         <Stack.Screen name="Login" component={LoginScreen}/>
         <Stack.Screen name="Signup" component={SignupScreen}/>
      </Stack.Navigator>
   );
};

const HomeNavStack = () => {
   return (
      <Stack.Navigator>
         <Stack.Screen name="Home" component={HomeScreen}/>
      </Stack.Navigator>
   );
};

const App = () => {
   const { state, resolveAuthToken } = useContext(AuthContext);

   useEffect(() => {
      setTimeout(resolveAuthToken, 1000);
   }, []);

   if (state.isLoading) {
      return <AuthSplashScreen/>;
   }

   return (
      <NavigationContainer>
         {state.token === null ? <AuthNavStack/> : <HomeScreen/>}
      </NavigationContainer>
   );
};

export default () => {
   return (
      <AuthProvider>
         <App/>
      </AuthProvider>
   );
}
