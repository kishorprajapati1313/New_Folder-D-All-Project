using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Audio : MonoBehaviour
{
    public AudioSource audioSource; // Reference to the AudioSource component
    public AudioClip audioClip;     // The audio clip to play

    void Update()
    {
        // Check if the "W" key is pressed
        if (Input.GetKeyDown(KeyCode.Z)  && Animal_Dialogs1.s4)
        {
            // Check if an audio clip is assigned
            if (audioClip != null)
            {
                // Play the audio
                audioSource.clip = audioClip;
                audioSource.Play();
            }
        }
    }
}
