import React, { useContext } from 'react';
import { SafeAreaView, TextInput, StyleSheet, View, TouchableOpacity, Text } from 'react-native';
import { Context as AuthContext } from '../contexts/AuthContext';
import { Button } from 'react-native-elements';

const LoginScreen = ({ navigation }) => {
   const { errorMessage } = useContext(AuthContext);

   return (
      <SafeAreaView style={{
         justifyContent: 'center',
         flex: 1,
         alignItems: 'center',
         flexDirection: 'column',
      }}>
         <View style={{ width: '100%', alignItems: 'center', justifyContent: 'center', flex: 4 }}>
            <TextInput
               placeholder="Email"
               placeholderTextColor="#216EABFF"
               autoCapitalize="none"
               style={styles.textInput}
               onChangeText={(text) => {
               }}
               autoCorrect={false}
            />
            <TextInput
               placeholder="Password"
               placeholderTextColor="#216EABFF"
               autoCapitalize="none"
               style={styles.textInput}
               onChangeText={(text) => {
               }}
               secureTextEntry
            />
            <TouchableOpacity
               style={styles.loginButton}
               onPress={() => {
               }}
               title='Login'
            >
               <Text style={{ color: 'white', fontWeight: 'bold', fontSize: 16 }}>Login</Text>
            </TouchableOpacity>
            <TouchableOpacity onPress={() => navigation.navigate('Signup')}>
               <Text style={{ color: '#216EABFF', fontWeight: 'bold', fontSize: 13 }}>Don't have an account? Sign-up</Text>
            </TouchableOpacity>
         </View>
         <View style={{ flex: 1 }}/>
      </SafeAreaView>
   );
}

const styles = StyleSheet.create({
   textInput: {
      marginVertical: 5,
      marginHorizontal: 'auto',
      paddingVertical: 5,
      paddingHorizontal: 12,
      width: 250,
      color: '#216EABFF',
      fontWeight: 'bold',
      textAlign: 'center',
      borderColor: '#46a3ec',
      borderWidth: 2,
      borderRadius: 5
   },

   loginButton: {
      fontSize: 1,
      backgroundColor: '#46a3ec',
      width: 250,
      alignItems: 'center',
      margin: 20,
      padding: 10,
      borderRadius: 5,
   },
});

export default LoginScreen;
