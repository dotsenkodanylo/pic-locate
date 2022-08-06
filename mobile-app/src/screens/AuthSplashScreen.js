import React from 'react';
import { ActivityIndicator, SafeAreaView, Text } from 'react-native';

const AuthSplashScreen = () => {
   return (
      <SafeAreaView style={{
         justifyContent: 'center',
         flex: 1
      }}>
         <ActivityIndicator size="large"/>
         <Text style={{ textAlign: 'center' }}>Loading</Text>

      </SafeAreaView>
   );
}

export default AuthSplashScreen;
