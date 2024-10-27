using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.XR.ARFoundation; // Add this line if not already present

public class arcon : MonoBehaviour
{
    public GameObject myob;
    public ARRaycastManager raycast;

    private void Update() {
        if(Input.touchCount > 0 && Input.GetTouch(0).phase == TouchPhase.Began)
        {
            List<ARRaycastHit> hits = new List<ARRaycastHit>();

            raycast.Raycast(Input.GetTouch(0).position, hits, UnityEngine.XR.ARSubsystems.TrackableType.Planes);

            if(hits.Count > 0)
            {
                Instantiate(myob, hits[0].pose.position, hits[0].pose.rotation);
            }
        }    
    }
}
