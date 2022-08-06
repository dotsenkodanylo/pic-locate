import React, { useContext } from 'react';
import { SafeAreaView, Text } from 'react-native';
import { Context as AuthContext } from '../contexts/AuthContext';
import { Button } from 'react-native-elements';

const SignupScreen = ({ navigation }) => {
   const { errorMessage } = useContext(AuthContext);

   return (
      <SafeAreaView>
         <Text style={{ textAlign: 'center' }}>Signup please</Text>
      </SafeAreaView>
   );
}

export default SignupScreen;
