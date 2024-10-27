using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class Dialog_Controll : MonoBehaviour
{
    public GameObject d_tree;
    public GameObject canva;
    public bool player_detected = false;

    private List<string> dialogMessages = new List<string>();
    private int currentMessageIndex = 0;
    
    private List<GameObject> dialogClones = new List<GameObject>(); // Store the cloned dialog objects

    private bool t1 = false;
    public static bool s1;

    void Start()
    {
        dialogMessages.Add("I am Goli Vali Patient");
        dialogMessages.Add("You can call me G.V.P");
        dialogMessages.Add("We are facing the Zombie Apoclips");
        dialogMessages.Add("You Have Deliver This Letter to the other People so they Will bw safe");
        dialogMessages.Add("                            Achive Letter1");


        // Start with the canvas disabled
        canva.SetActive(false);
    }

    void Update()
    {
        if (player_detected && Input.GetKeyDown(KeyCode.E) && (!Player_control.dialog || currentMessageIndex >= dialogMessages.Count))
        {
            canva.SetActive(true);
            Player_control.dialog = true;
            StartCoroutine(DisplayDialog());
            t1 = true;
            s1 = t1;
        }
    }

    

    IEnumerator DisplayDialog()
    {
        currentMessageIndex = 0;

        while (currentMessageIndex < dialogMessages.Count)
        {
            NewDialog(dialogMessages[currentMessageIndex]);
            yield return new WaitForSeconds(2f); // Adjust the delay between messages as needed
            currentMessageIndex++;
        }

        // Show the canvas after displaying all messages
        canva.transform.GetChild(1).gameObject.SetActive(true);

        // Destroy the cloned dialog objects
        foreach (var dialogClone in dialogClones)
        {
            Destroy(dialogClone);
        }
        // Hide the canvas
        canva.SetActive(false);
    }

    void NewDialog(string text)
    {
        GameObject templateClone = Instantiate(d_tree, d_tree.transform);
        templateClone.transform.SetParent(canva.transform);
        templateClone.transform.GetChild(1).GetComponent<TextMeshProUGUI>().text = text;
        dialogClones.Add(templateClone); // Add the cloned dialog object to the list
    }

    void OnTriggerEnter(Collider other)
    {
        if (other.name == "Player")
        {
            player_detected = true;
        }
    }

    void OnTriggerExit(Collider other)
    {
        if (other.name == "Player")
        {
            player_detected = false;
        }
    }
}
