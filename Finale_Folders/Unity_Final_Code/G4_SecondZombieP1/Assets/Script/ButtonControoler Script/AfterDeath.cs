using UnityEngine;
using UnityEngine.SceneManagement;

public class AfterDeath : MonoBehaviour
{
    public AudioSource backgroundMusic;
    public AudioSource sfxAudio;

    public AudioClip background;
    public AudioClip sfx;

    private void Start()
    {
        // Assuming you have already assigned AudioSource components to 'backgroundMusic' and 'sfxAudio' in the Inspector
        backgroundMusic.clip = background;
        backgroundMusic.loop = true;
        backgroundMusic.Play();
    }

    public void RestartGame()
    {
        sfxAudio.clip = sfx;
        sfxAudio.pitch = 1.5f; // Adjust the pitch to make it faster
        sfxAudio.Play();

        // Delay the scene loading by 1.5 seconds (adjust the delay as needed)
        Invoke("LoadLevel", 0.5f);
    }

    private void LoadLevel()
    {
        SceneManager.LoadScene("LEVEL1.1");
        // SceneManager.LoadScene("LEVEL1");
    }

    public void QuitGame()
    {
        sfxAudio.clip = sfx;
        sfxAudio.Play();
        Application.Quit();
    }
}
