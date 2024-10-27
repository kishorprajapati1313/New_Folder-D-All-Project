using UnityEngine;
using UnityEngine.SceneManagement;

public class ButtonCOntroller : MonoBehaviour
{
    // public string sceneToLoad = "LEVEL1";
    public string sceneToLoad = "LEVEL1.1";

    public AudioSource backgroundMusic;
    public AudioSource buttonClickSound;

    private void Start()
    {
        backgroundMusic.Play();
    }

    // Start is called before the first frame update
    public void StartGame()
    {
        buttonClickSound.Play();

        Invoke("LoadLevel", 0.5f);
        
    }

    public void LoadLevel () {
        // Load the specified scene
        SceneManager.LoadScene(sceneToLoad);
    }

    // Update is called once per frame
    public void QuitGame()
    {
        buttonClickSound.Play();
        // Quit the application
        Application.Quit();
    }
}
