import React, { useContext } from 'react';
import { SafeAreaView, Text } from 'react-native';
import {Context as AuthContext} from '../contexts/AuthContext';
import { Button } from 'react-native-elements';

const HomeScreen = () => {
   const {offloadToken} = useContext(AuthContext);
   return (
      <SafeAreaView>
         <Text style={{ textAlign: 'center' }}>Home!</Text>
         <Button onPress={offloadToken} title='Offload token'/>
      </SafeAreaView>
   );
}

export default HomeScreen;
