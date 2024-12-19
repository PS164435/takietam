// start UI
using UnityEngine;
using UnityEngine.XR.Interaction.Toolkit;
using System.Collections.Generic;

public class ToggleComponentsForStart : MonoBehaviour
{
    private Vector3 wallEndPosition = new Vector3(0f, -4f, 4.5f);
    public float speed;
    private bool nextPart = false;
    public GameObject xrOrigin;
   
    private void Update()
    {
        if (name=="StartWallOn")
        {
            nextPart = true;
        }
        if(nextPart)
        {
            transform.position = Vector3.MoveTowards(transform.position, wallEndPosition, speed * Time.deltaTime);
            
            if (transform.position == wallEndPosition)
            {
                nextPart = false;
            }
            
        }
    }
}
