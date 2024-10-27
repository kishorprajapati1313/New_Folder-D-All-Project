using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class GPS_Dialogs : MonoBehaviour
{
  
    public GameObject d_tree;
    public GameObject canva;
    public bool player_detected = false;

    private List<string> dialogMessages = new List<string>();
    private int currentMessageIndex = 0;
    
    private List<GameObject> dialogClones = new List<GameObject>(); // Store the cloned dialog objects

    bool t1 = false;
     public static bool s3;
    
    void Start()
    {
        dialogMessages.Add("G.P.S:- Ohh My Thank Godness my GrandChild Is Alive");
        dialogMessages.Add("G.P.S:- Now I have to Protect The My Child");
        dialogMessages.Add("G.P.S:- Can you give This Letter to The Police");
        dialogMessages.Add("                            Achive letter2 ");

        // Start with the canvas disabled
        canva.SetActive(false);
    }

    void Update()
    {
        if (player_detected && Input.GetKeyDown(KeyCode.E)  && Barbqb_Dialogs2.s2)
        {
            canva.SetActive(true);
            Player_control.dialog = true;
            StartCoroutine(DisplayDialog());
            t1 = true;
            s3 = t1;
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
