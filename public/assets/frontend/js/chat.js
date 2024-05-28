import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js'
import {
    getFirestore,
    collection,
    getDocs,
    query,
    where,
    addDoc,
    onSnapshot,
    deleteDoc,
} from 'https://www.gstatic.com/firebasejs/10.12.1/firebase-firestore.js'

const firebaseConfig = {
    apiKey: 'AIzaSyAZeHyTwfbiZjnbnILw_OpOA3rMj52lO3g',
    authDomain: 'chuyendoisochat.firebaseapp.com',
    projectId: 'chuyendoisochat',
    storageBucket: 'chuyendoisochat.appspot.com',
    messagingSenderId: '23514328089',
    appId: '1:23514328089:web:9db2f3a7b454f13a184e88',
}

// Initialize Firebase
const app = initializeApp(firebaseConfig)
const db = getFirestore(app)

class Chat {
    constructor(conversationId, firebaseTableName) {
        this.conversationId = Number(conversationId)
        this.messageRef = collection(db, firebaseTableName || 'message_thai')
    }
    loadMessages(callback) {
        let messageQuery = query(this.messageRef, where('conversation_id', '==', this.conversationId))
        onSnapshot(messageQuery, (snapshot) => {
            callback(snapshot.docs.map((doc) => {
                return { id: doc.id, ...doc.data() }
            }).sort((a, b) => a.created_at - b.created_at))
        })
    }
    async sendMessage(userId, message) {
        await addDoc(this.messageRef, {
            conversation_id: this.conversationId,
            user_id: userId,
            message: message,
            created_at: new Date(),
        })
    }
    async deleteConversation(conversationId) {
        let messageQuery = query(this.messageRef, where('conversation_id', '==', Number(conversationId)))
        let querySnapshot = await getDocs(messageQuery)

        querySnapshot.forEach(function (doc) {
            deleteDoc(doc.ref)
        })
    }

    async deleteAll() {
        let messageQuery = query(this.messageRef, where('conversation_id', '==', this.conversationId))
        let querySnapshot = await getDocs(messageQuery)
        querySnapshot.forEach(async (doc) => {
            await deleteDoc(doc.ref)
        })
    }


}

window.Chat = Chat